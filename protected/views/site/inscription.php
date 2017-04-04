<?php
Yii::app()->clientScript->registerScriptFile(
    Yii::app()->baseUrl.'/js/file.js'
);
?>

<h1>Inscription</h1>

<div class="form">
<?php
	
	$form=$this->beginWidget('CActiveForm',array(
		'id'=>'inscription-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	));
?>

	<div class="row">
		<p align='center'>Avant de vous inscrire, dites nous quel est votre statut</p>
		
		<!-- Boutons radios pour le statut -->
		<div align='center' id="compactRadioGroup">
			<?php echo $form->radioButtonList($model, 'role', 
											  array('employe'=>'Un Employé', 'entreprise'=>'Une Entreprise'),
											  array('separator'=> " ")); ?>
		</div>
		<!-- Fin bouton radio -->

		<?php echo $form->error($model,'login'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textfield($model,'login'); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mot_de_passe'); ?>
		<?php echo $form->passwordfield($model,'mot_de_passe'); ?>
		<?php echo $form->error($model,'mot_de_passe'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Inscription'); ?>
	</div>

	<?php $this->endWidget(); ?>
	</div>
