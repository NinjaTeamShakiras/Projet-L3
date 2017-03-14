<?php
/* @var $this EntrepriseController */
/* @var $model Entreprise */
/* @var $adresse Adresse */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entreprise-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Champs à remplir obligatoirement.</p>

	<?php echo $form->errorSummary($model);

		// Récupération de l'adresse
		$adresse = Adresse::model()->FindByAttributes(array('id_adresse'=>$model->id_adresse));

	?>

	<div class="row">
		<?php echo $form->labelEx($model,'nom_entreprise'); ?>
		<?php echo $form->textField($model,'nom_entreprise',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nom_entreprise'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_employes'); ?>
		<?php echo $form->textField($model,'nombre_employes'); ?>
		<?php echo $form->error($model,'nombre_employes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recherche_employes'); ?>
		<?php echo $form->dropDownList($model,'recherche_employes',array('1' => 'Oui', '0' => 'Non')); ?>
		<?php echo $form->error($model,'recherche_employes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mail_entreprise'); ?>
		<?php echo $form->textField($model,'mail_entreprise',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'mail_entreprise'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone_entreprise'); ?>
		<?php echo $form->textField($model,'telephone_entreprise',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telephone_entreprise'); ?>
	</div>


	<!-- Changement de source, on recherche dans $adresse-->
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
	<!-- Fin changement de source -->


	<!-- BUTTON -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Enregistrer'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'View' : 'Annuler'); ?>
	</div>
	<!-- FIN BUTTON -->

<?php $this->endWidget(); ?>

</div><!-- form -->