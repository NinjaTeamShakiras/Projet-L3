<?php
/* @var $this AvisEntrepriseController */
/* @var $model AvisEntreprise */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'avis-entreprise-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'note_generale'); ?>
		<?php echo $form->textField($model,'note_generale'); ?>
		<?php echo $form->error($model,'note_generale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'commentaire_avis_entreprise'); ?>
		<?php echo $form->textField($model,'commentaire_avis_entreprise',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'commentaire_avis_entreprise'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_entreprise'); ?>
		<?php echo $form->textField($model,'id_entreprise'); ?>
		<?php echo $form->error($model,'id_entreprise'); ?>
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