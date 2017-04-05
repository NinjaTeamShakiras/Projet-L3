<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$user = Utilisateur::model()->findbyattributes(array('login'=>$model->username));
			$user->date_derniere_connexion = date("Y-m-d H:i:s");
			
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$user = Utilisateur::model()->findByattributes(array('login'=>$model->username));

				date_default_timezone_set('Europe/Paris');
				$date = (new \DateTime())->format('Y-m-d H:i:s');
				$user->date_derniere_connexion = $date;
				$user->save();
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionInscription()
	{                        
		$model = new Employe;
		$entreprise = new Entreprise;
		$user = new Utilisateur;

		$emp = 0;


		if(isset($_POST['Utilisateur']))
		{
			foreach($_POST['Employe'] as $a){
				if($a != ""){
					$emp = 1;
				}
			}
		}


		if(isset($_POST['Utilisateur']) && $emp == 1)
		{

			$model->attributes = $_POST['Employe'];
			$model->date_naissance_employe = NULL;
			$model->employe_travaille = NULL;
			$model->telephone_employe = NULL;
			$model->id_adresse = NULL;
			
			$model->save();

			//Définition du fuseau horaire GMT+1
			date_default_timezone_set('Europe/Paris');
			$date = (new \DateTime())->format('Y-m-d H:i:s');
			$user->date_creation_utilisateur = $date;
			$user->date_derniere_connexion = $date;
			$user->attributes = $_POST['Utilisateur'];
			$user->role = "employe";


			$employe = Employe::model()->findByAttributes(array("id_employe"=>$model->id_employe));;
			$user->id_employe = $employe->id_employe;

			
			$user->save();
		} 	
		else if(isset($_POST['Utilisateur']) && isset($_POST['Entreprise']))
		{
			$entreprise->attributes = $_POST['Entreprise'];
			$entreprise->recherche_employes = NULL;
			$entreprise->mail_entreprise = NULL;
			$entreprise->telephone_entreprise = NULL;
			$entreprise->id_adresse = NULL;

			$entreprise->save();

			//Définition du fuseau horaire GMT+1
			date_default_timezone_set('Europe/Paris');
			$date = (new \DateTime())->format('Y-m-d H:i:s');
			$user->date_creation_utilisateur = $date;
			$user->date_derniere_connexion = $date;
			$user->attributes = $_POST['Utilisateur'];
			$user->role = "entreprise";


			$entreprise = Entreprise::model()->findByAttributes(array("id_entreprise"=>$entreprise->id_entreprise));;
			$user->id_entreprise = $entreprise->id_entreprise;

			$user ->save();

		}
		$this->render('inscription', array('model'=>$user, 'employe'=>$model,'entreprise'=>$entreprise));
	}
}