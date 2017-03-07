<?php
/* @var $this EmployeController */
/* @var $data Employe */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_employe')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_employe), array('view', 'id'=>$data->id_employe)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom_employe')); ?>:</b>
	<?php echo CHtml::encode($data->nom_employe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prenom_employe')); ?>:</b>
	<?php echo CHtml::encode($data->prenom_employe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age_employe')); ?>:</b>
	<?php echo CHtml::encode($data->age_employe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employe_travaille')); ?>:</b>
	<?php echo CHtml::encode($data->employe_travaille); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mail_employe')); ?>:</b>
	<?php echo CHtml::encode($data->mail_employe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone_employe')); ?>:</b>
	<?php echo CHtml::encode($data->telephone_employe); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_adresse')); ?>:</b>
	<?php echo CHtml::encode($data->id_adresse); ?>
	<br />

	*/ ?>

</div>