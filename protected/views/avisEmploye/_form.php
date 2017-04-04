<?php
/* @var $this AvisEmployeController */
/* @var $model AvisEmploye */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'avis-employe-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'note_generale_avis'); ?>
		<?php echo $form->textField($model,'note_generale_avis'); ?>
		<?php echo $form->error($model,'note_generale_avis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_creation'); ?>
		<?php echo $form->textField($model,'date_creation'); ?>
		<?php echo $form->error($model,'date_creation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nb_signalements'); ?>
		<?php echo $form->textField($model,'nb_signalements'); ?>
		<?php echo $form->error($model,'nb_signalements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_employe'); ?>
		<?php echo $form->textField($model,'id_employe'); ?>
		<?php echo $form->error($model,'id_employe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_utilisateur'); ?>
		<?php echo $form->textField($model,'id_utilisateur'); ?>
		<?php echo $form->error($model,'id_utilisateur'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->