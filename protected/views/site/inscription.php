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
