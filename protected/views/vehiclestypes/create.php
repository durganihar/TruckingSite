<?php
/* @var $this VehiclestypesController */
/* @var $model Vehiclestypes */

$this->breadcrumbs=array(
	'Vehiclestypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vehiclestypes', 'url'=>array('index')),
	array('label'=>'Manage Vehiclestypes', 'url'=>array('admin')),
);
?>

<h1>Create Vehiclestypes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>