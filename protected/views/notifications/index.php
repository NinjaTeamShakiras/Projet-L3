<?php
/* @var $this NotificationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Notifications',
);

$this->menu=array(
	array('label'=>'Create Notifications', 'url'=>array('create')),
	array('label'=>'Manage Notifications', 'url'=>array('admin')),
);
?>

<h1>Notifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
