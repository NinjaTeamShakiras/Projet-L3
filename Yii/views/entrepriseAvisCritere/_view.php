<?php
/* @var $this EntrepriseAvisCritereController */
/* @var $data EntrepriseAvisCritere */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_entreprise_avis')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_entreprise_avis), array('view', 'id'=>$data->id_entreprise_avis)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note_entreprise_avis')); ?>:</b>
	<?php echo CHtml::encode($data->note_entreprise_avis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_employe')); ?>:</b>
	<?php echo CHtml::encode($data->id_employe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_critere_notation_entreprise')); ?>:</b>
	<?php echo CHtml::encode($data->id_critere_notation_entreprise); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_avis_entreprise')); ?>:</b>
	<?php echo CHtml::encode($data->id_avis_entreprise); ?>
	<br />


</div>