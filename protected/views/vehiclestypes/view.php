<?php
/* @var $this VehiclestypesController */
/* @var $model Vehiclestypes */

$this->breadcrumbs=array(
	'Vehiclestypes'=>array('index'),
	$model->vehicles_type_id,
);

$this->menu=array(
	array('label'=>'List Vehiclestypes', 'url'=>array('index')),
	array('label'=>'Create Vehiclestypes', 'url'=>array('create')),
	array('label'=>'Update Vehiclestypes', 'url'=>array('update', 'id'=>$model->vehicles_type_id)),
	array('label'=>'Delete Vehiclestypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vehicles_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vehiclestypes', 'url'=>array('admin')),
);
?>

<h1>View Vehiclestypes #<?php echo $model->vehicles_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vehicles_type_id',
		'vehicles_type',
	),
)); ?>
