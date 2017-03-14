<?php

class EmployeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		if(Yii::app()->user->role == 'employe')
		{
			return array(
					array('allow',
						'actions'=>['index','view', 'update', 'delete'],
						),
					array('deny',
						'actions'=>['admin'],
						),
					);
		}

		if(Yii::app()->user->role == 'entreprise')
		{

			return array(
					array('allow',
						'actions'=>['view'],
						),
					array('deny',
						'actions'=>['index','update','admin'],
						),
					);
		}
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Employe;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Employe']))
		{
			$model->attributes=$_POST['Employe'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_employe));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$adresse= Adresse::model()->findByAttributes(array('id_adresse'=>$model->id_adresse));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Employe']) && isset($_POST['Adresse']))
		{

			$model->attributes = $_POST['Employe'];
			$adresse->attributes = $_POST['Adresse'];

			$valid = $model->validate();
			$valid = $adresse->validate() && $valid;;

			if($valid)
			{
				if($model->save())
				{
					$adresse->save();
					$this->redirect(array('view','id'=>$model->id_employe));
				}
			}			
		}

		$this->render('update',array(
			'model'=>$model,
			'adresse'=>$adresse,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);

		//on supprime les users
		$users = $users = Utilisateur::model()->findall("id_employe = ".$model->id_employe);
		if(count($users>=0))
		{
			foreach($users as $user)
			{
				$user->delete();
			}
		}

		//on supprime les occurences de la table travaille
		$travailles = $travailles = Travaille::model()->findall("id_employe = ".$model->id_employe);
		if(count($travailles>=0))
		{
			foreach($travailles as $travaille)
			{
				$travaille->delete();
			}
		}

		//on supprime le cv de l'employé
		$CVs = $CVs = CvEmploye::model()->findall("id_employe = ".$model->id_employe);
		if(count($CVs>=0))
		{
			foreach($CVs as $CV)
			{
				$CV->delete();
			}
		}


		//Pour chaque avis, on supprime 
		$avis_emp = $avis_emp = AvisEmploye::model()->findall("id_employe = ".$model->id_employe);
		if(count($avis_emp>=0))
		{
			foreach($avis_emp as $avis)
			{
				$avis->delete();
			}
		}

		Yii::app()->user->logout();
		$model->delete();	

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect("index.php");
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Employe');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Employe('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employe']))
			$model->attributes=$_GET['Employe'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Employe the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Employe::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Employe $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='employe-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
