<?php
/* @var $this VehiclestypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vehiclestypes',
);

$this->menu=array(
	array('label'=>'Create Vehiclestypes', 'url'=>array('create')),
	array('label'=>'Manage Vehiclestypes', 'url'=>array('admin')),
);
?>

<h1>Vehiclestypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
