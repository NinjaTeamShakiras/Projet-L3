<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">

		<?php 

		//On récupère les données de l'utilisateur qui est sur le site
		$user = Yii::app()->user;

		$utilisateur = Utilisateur::model()->FindByAttributes(array('login'=>$user->id));
		
		//Si c'est un employé, on lui affiche certains onglets
		if($user->getState('type') == "employe")
		{

			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Accueil', 'url'=>array('/site/index')),
				array('label'=>'Liste des entreprises', 'url'=>array('/entreprise/index' )),
				array('label'=>'Mon compte', 'url'=>array('/employe/view', 'id'=>$utilisateur->id_employe)),
				array('label'=>'Connexion', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Déconnexion ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			));
		}
		//Si c'est une entreprise, on lui affiche certains autres onglets
		else if($user->getState('type') == "entreprise")
		{
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Accueil', 'url'=>array('/site/index')),
				array('label'=>'A propos', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Mon entreprise', 'url'=>array('/entreprise/view', 'id'=>$utilisateur->id_entreprise)),
				array('label'=>'Connexion', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Déconnexion ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			));
		}
		//Si c'est un invité, il n'a que la connexion
		else
		{
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				// Visible hors connexion
				array('label'=>'Connexion', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				// Visible que si connecté
				array('label'=>'Déconnexion ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Inscription', 'url'=>array('/site/inscription'), 'visible'=>Yii::app()->user->isGuest),  
				),
			));
		}

		 
		
		?>


	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by NinjaTeam.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
