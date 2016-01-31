<?php
/* @var $this VehiclestypesController */
/* @var $model Vehiclestypes */

$this->breadcrumbs=array(
	'Vehiclestypes'=>array('index'),
	$model->vehicles_type_id=>array('view','id'=>$model->vehicles_type_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vehiclestypes', 'url'=>array('index')),
	array('label'=>'Create Vehiclestypes', 'url'=>array('create')),
	array('label'=>'View Vehiclestypes', 'url'=>array('view', 'id'=>$model->vehicles_type_id)),
	array('label'=>'Manage Vehiclestypes', 'url'=>array('admin')),
);
?>

<h1>Update Vehiclestypes <?php echo $model->vehicles_type_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>