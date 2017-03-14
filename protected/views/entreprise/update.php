<?php
/* @var $this EntrepriseController */
/* @var $model Entreprise */

$this->breadcrumbs=array(
	'Entreprises'=>array('index'),
	$model->id_entreprise=>array('view','id'=>$model->id_entreprise),
	'Mise à jour',
);?>

<!--TITRE PAGE -->
<h1>Mise à jour de votre entreprise</h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>