<?php
/* @var $this EntrepriseController */
/* @var $model Entreprise */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php 

$adresse = Adresse::model()->findAll();

//Lorsqu'on clique sur le bouton sumbit, le formulaire renvoie vers actionSearch de EntrepriseController
$form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl('Entreprise/Search'),
)); ?>

	<div class="row" align='center'>
	<!-- Recherche d'une entreprise (textfield + bouton submit) -->	
		<?php echo $form->textField($model,'nom_entreprise',array('size'=>45,'maxlength'=>45, 'placeholder'=>'Rechercher une entreprise')); ?>
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

	<div class="row buttons">
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->