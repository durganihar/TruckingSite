<?php
/* @var $this SiteController */
/* @var $model DispatchForm */
/* @var $form CActiveForm  */


?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'DispatchAdd-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<h3> Add A Dispatch </h3>

        <?php 
        
             $options=CHtml::listData($model->getVehicles(2), 'vehicles_id','license_plate');
                		 		  			              
              echo "Select Truck : ".$form->dropDownList($model,'licensePlateNumber',$options);
          ?>
          </br>
          <a href="index.php?r=addData/addVehicles">Add Vehicles</a>
          </br>
          <?php    
             $options=CHtml::listData($model->getVehicles(1), 'vehicles_id','license_plate');
 			           
             echo "</br>Select Trailer : ".$form->dropDownList($model,'licensePlateNumber',$options);
             
             echo $form->labelEx($model,'odometer'); 
		     echo $form->textField($model,'odometer'); 
		     
            
        ?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->