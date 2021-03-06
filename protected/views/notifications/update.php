<?php
/* @var $this NotificationsController */
/* @var $model Notifications */

$this->breadcrumbs=array(
	'Notifications'=>array('index'),
	$model->id_notifcation=>array('view','id'=>$model->id_notifcation),
	'Update',
);

$this->menu=array(
	array('label'=>'List Notifications', 'url'=>array('index')),
	array('label'=>'Create Notifications', 'url'=>array('create')),
	array('label'=>'View Notifications', 'url'=>array('view', 'id'=>$model->id_notifcation)),
	array('label'=>'Manage Notifications', 'url'=>array('admin')),
);
?>

<h1>Update Notifications <?php echo $model->id_notifcation; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>