<?php
/* @var $this EmployeController */
/* @var $model Employe */

$this->breadcrumbs=array(
	'Employes'=>array('index'),
	$model->id_employe=>array('view','id'=>$model->id_employe),
	'Mise à jour',
);?>

<!--TITRE PAGE -->
<h1>Mise à jour de mon profil</h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
