
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'DispatchAdd-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<h3> Add Vehicles </h3>
	<div class="row">
	
		<?php echo $form->labelEx($model,'Truck License Number'); ?>
		<?php echo $form->textField($model,'licensePlateNumber'); ?>
		<?php echo $form->error($model,'licensePlateNumber'); ?>
		<?php Yii::app()->session['vehicleTypeId'] = '1';  ?>
		
			</div>

	<div class="row">
	    <?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->dropDownList($model,'status',array("1"=>"Active","0"=>"InActive"),array('empty'=>'Select Value'));?>
	</div>

       	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>