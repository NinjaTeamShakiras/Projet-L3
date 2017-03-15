<?php
/* @var $this EntrepriseController */
/* @var $model Entreprise */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php 

$adresse = Adresse::model()->findAll();

$form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl('Entreprise/search'),
	'method'=>'get',
)); ?>

	<div class="row" align='center'>
		<?php 
		echo $form->textField($model,'nom_entreprise',array('size'=>45,'maxlength'=>45, 'value'=>'Rechercher une entreprise')); ?>
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

	<div class="row buttons">
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->