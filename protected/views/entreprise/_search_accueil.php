<?php
/* @var $this EntrepriseController */
/* @var $model Entreprise */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php 

$adresse = Adresse::model()->findAll();

var_dump(Yii::app()->user->getState('type'));

$form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl('Entreprise/Search'),
	'method'=>'get',
)); ?>

	<div class="row" align='center'>
		<p>Ne fonctionne pas, à voir ! </p>
		<?php 
		echo $form->textField($model,'nom_entreprise',array('size'=>45,'maxlength'=>45, 'value'=>'Rechercher une entreprise')); ?>
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

	<div class="row buttons">
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->