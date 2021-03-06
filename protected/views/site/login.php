<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
 $this->pageTitle=Yii::app()->name . ' - Connexion';
// $this->breadcrumbs=array(
// 	'Connexion',
// );
?>


<h1>Connexion</h1>

<div class="form">
<?php 

	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); 
?>

	<!--<p class="note"><span class="required">*</span> Champs à remplir obligatoirement.</p>-->

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			<!-- Commentaire ? -->
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Se connecter'); ?>
	</div>

	<div>
		<p>Login : MF (pour employe), GIT (pour entreprise)</p>
		<p>MDP : password (pour les 2)</p>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
