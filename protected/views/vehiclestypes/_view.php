<?php
/* @var $this VehiclestypesController */
/* @var $data Vehiclestypes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicles_type_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vehicles_type_id), array('view', 'id'=>$data->vehicles_type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicles_type')); ?>:</b>
	<?php echo CHtml::encode($data->vehicles_type); ?>
	<br />


</div>