<?php

class AvisEmployeController extends Controller
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'CreerAvisEmploye'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
		$model=new AvisEmploye;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AvisEmploye']))
		{
			$model->attributes=$_POST['AvisEmploye'];

			var_dump( $_POST );
			//if($model->save())
				$this->redirect(array('view','id'=>$model->id_avis_employe));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/*		Fonction pour créer un avis à un employé avec tous les critères requis 		*/
	public function actionCreerAvisEmploye()
	{
		$avisEmploye = new AvisEmploye();
		

		if( isset( $_POST['AvisEmploye'] ) )
		{
			/*		Définition du fuseau horaire GMT+1		*/
			date_default_timezone_set( 'Europe/Paris' );
			
			/*		Récupération de la date et l'heure actuelle 	*/
			$date = (new \DateTime())->format('Y-m-d H:i:s');

			/*		Variable pour le nombre d'éléments et la note globale 		*/
			$somme_double = 0;
			$nb_elements_int = 0;

			/*		Affectation sur la table Avis_Employe 		*/
			$avisEmploye->date_creation_avis_employe = $date;
			$avisEmploye->nb_signalements_avis_employe = 0;
			$avisEmploye->id_employe = $_POST['AvisEmploye']['id_employe'];
			$avisEmploye->id_utilisateur = Utilisateur::get_id_utilisateur_connexion( Yii::app()->user->getId() );
			/*		Boucle pour calculer la note moyenne 		*/
			foreach ( $_POST as $key => $value ) 
			{
				/*		Si c'est un critère noté on fait la somme	*/
				if ( strpos( $key, "_note" ) ) 
				{
					$somme_double += $value;
					$nb_elements_int++;
				}
			}
			$avisEmploye->note_generale_avis_employe = $somme_double / $nb_elements_int;
			$avisEmploye->save();

			/*		Affectation sur la table Employe_Avis_Criteres 		*/
			foreach ( $_POST as $key => $value ) 
			{
				/*		On cherche que les paramètres POST qui sont notés ou avecc un commentaire 		*/
				if( strpos( $key, "_text" ) )
				{
					$avisEmployeCriteres = new EmployeAvisCritere();
					$avisEmployeCriteres->commentaire_evaluation_critere = $value;
					$avisEmployeCriteres->id_critere_notation_employe = intval( str_replace( '_text', '', $key ) ); 
					$avisEmployeCriteres->id_avis_employe = $avisEmploye->id_avis_employe;
					$avisEmployeCriteres->save();
				}
				else if ( strpos( $key, "_note" ) )
				{
					$avisEmployeCriteres_note = new EmployeAvisCritere();
					$avisEmployeCriteres_note->note_employe_avis = $value;
					$avisEmployeCriteres_note->id_critere_notation_employe = intval( str_replace( '_note', '', $key ) );
					$avisEmployeCriteres_note->id_avis_employe = $avisEmploye->id_avis_employe;
					$avisEmployeCriteres_note->save();
				}
			}

			/*		On redirige vers l'employé concerné 		*/
			$url =  $this->createUrl( 'employe/view', array( 	'id' => $avisEmploye->id_employe,
																'error' => 0 ) );
			$this->redirect( $url );
		
		}
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AvisEmploye']))
		{
			$model->attributes=$_POST['AvisEmploye'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_avis_employe));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AvisEmploye');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AvisEmploye('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AvisEmploye']))
			$model->attributes=$_GET['AvisEmploye'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AvisEmploye the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AvisEmploye::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AvisEmploye $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='avis-employe-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
