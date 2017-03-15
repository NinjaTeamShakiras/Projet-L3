<?php
/* @var $this AvisEmployeController */
/* @var $data AvisEmploye */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_avis_employe')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_avis_employe), array('view', 'id'=>$data->id_avis_employe)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note_generale')); ?>:</b>
	<?php echo CHtml::encode($data->note_generale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('commentaire_avis_employe')); ?>:</b>
	<?php echo CHtml::encode($data->commentaire_avis_employe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_employe')); ?>:</b>
	<?php echo CHtml::encode($data->id_employe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_utilisateur')); ?>:</b>
	<?php echo CHtml::encode($data->id_utilisateur); ?>
	<br />


</div>