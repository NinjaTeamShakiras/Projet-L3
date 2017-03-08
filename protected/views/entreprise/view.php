<?php
/* @var $this EntrepriseController */
/* @var $model Entreprise */

$this->breadcrumbs=array(
	'Entreprises'=>array('index'),
	$model->id_entreprise,
);

$this->menu=array(
	array('label'=>'Mettre à jour mon profil', 'url'=>array('update', 'id'=>$model->id_entreprise)),
);
?>

<h1>Votre espace personnel :</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nom_entreprise',
		'nombre_employes',
		array(
			'label'=>'Cherche des nouveaux employés',
			'value'=>$model->recherche_employes == 0 ? "Non" : "Oui",
			),
		'mail_entreprise',
		'telephone_entreprise',
		array(
			'label'=>'Adresse',
			'value'=>$model->Adresse->rue.", ".$model->Adresse->code_postal." ".$model->Adresse->ville,
			),
	),
)); ?>

<h1>Voici la liste des avis</h1>

