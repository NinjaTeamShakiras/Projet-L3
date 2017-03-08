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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); 

		$adresse = Adresse::model()->FindByAttributes(array('id_adresse'=>$model->id_adresse));

	?>

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
		<?php echo $form->labelEx($model,'age_employe'); ?>
		<?php echo $form->textField($model,'age_employe'); ?>
		<?php echo $form->error($model,'age_employe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employe_travaille'); ?>
		<?php echo $form->textField($model,'employe_travaille'); ?>
		<?php echo $form->error($model,'employe_travaille'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mail_employe'); ?>
		<?php echo $form->textField($model,'mail_employe',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'mail_employe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone_employe'); ?>
		<?php echo "Veuillez entrer votre numéro sous la forme 0606060606<br/>"; ?>
		<?php echo $form->textField($model,'telephone_employe',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telephone_employe'); ?>
	</div>

<<<<<<< HEAD
=======
	<div>
		<h1>Attention, maj adresse impossible ! Voir dans _form, Controller ET model</h1>
	</div>	

>>>>>>> 6fffe0093b55e71b25410b9358858b255c26f4c3
	<div class="row">
		<?php echo $form->labelEx($adresse,'rue'); ?>
		<?php echo $form->textField($adresse,'rue'); ?>
		<?php echo $form->error($adresse,'rue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($adresse,'ville'); ?>
		<?php echo $form->textField($adresse,'ville'); ?>
		<?php echo $form->error($adresse,'ville'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($adresse,'code_postal'); ?>
		<?php echo $form->textField($adresse,'code_postal'); ?>
		<?php echo $form->error($adresse,'code_postal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Enregistrer'); ?>
<<<<<<< HEAD
		<?php echo CHtml::submitButton($model->isNewRecord ? 'View' : 'Annuler'); ?>
=======
>>>>>>> 6fffe0093b55e71b25410b9358858b255c26f4c3
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->