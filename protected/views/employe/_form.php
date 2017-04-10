<?php
/* @var $this EmployeController */
/* @var $model Employe */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employe-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,

)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nom_employe'); ?>
		<?php echo $form->textField($model,'nom_employe',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nom_employe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prenom_employe'); ?>
		<?php echo $form->textField($model,'prenom_employe',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'prenom_employe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_naissance_employe'); ?>
		<?php echo $form->textField($model,'date_naissance_employe',
			array('maxlength'=>10, 
				  'placeholder'=>'JJ/MM/AAAA', 
				  'value'=>$this->changeDateNaissance($model->date_naissance_employe))); ?>
		<?php echo $form->error($model,'date_naissance_employe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employe_travaille'); ?>
		<?php 
		//0 : Ne travailles donc OUI car recherche du travail
		//Le contraire pour 1
		echo $form->dropDownList($model, 'employe_travaille', array('0'=>'Oui', '1'=>'Non')); ?>
		<?php echo $form->error($model,'employe_travaille'); ?>
	</div>

	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'mail_employe'); ?>
		<?php echo $form->textField($model,'mail_employe',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'mail_employe'); ?>
	</div>
	-->

	<div class="row">
		<?php echo $form->labelEx($model,'telephone_employe'); ?>
		<?php echo $form->textField($model,'telephone_employe',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telephone_employe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_adresse'); ?>
		<?php echo $form->textField($model,'id_adresse'); ?>
		<?php echo $form->error($model,'id_adresse'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->