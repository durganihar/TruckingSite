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


 <?php echo $form->labelEx($model,'Driver').$form->textField($model,'Driver',array('style'=>'width:250px')); ?>

        <?php 
       $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'encodeLabel' => false,
                'htmlOptions' => array(
                    'class' => 'page-sidebar-menu hidden-phone hidden-tablet' //You can customize this for your application
                )
            ));
        $this->menu =array(
	                    array('label'=>'Add Vehicles', 'url'=>array('addData/addVehicles')),
	                    array('label'=>'Manage Vehiclestypes', 'url'=>array('admin')),
              );         
        
        $options=CHtml::listData($model->getVehicles(2), 'vehicles_id','license_plate');
                		 		  			              
        echo $form->labelEx($model,'Select Truck').$form->dropDownList($model,'licensePlateNumber',$options);
             
        $options=CHtml::listData($model->getVehicles(1), 'vehicles_id','license_plate');
 			           
        echo $form->labelEx($model,'Select Trailer') .$form->dropDownList($model,'licensePlateNumber',$options);
             
        echo $form->labelEx($model,'odometer').$form->textField($model,'odometer',array('style'=>'width:250px')); 
		echo $form->labelEx($model,'Customer Name').$form->textField($model,'CustomerName',array('style'=>'width:250px'));
		     
		    /* Adding for ajax */
		    /* $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
  						'id'=>'site',
  						'name'=>'PictureAddTagForm[site]',
  						'source'=>$this->createUrl('site/suggest'),
  						'options'=>array(
    					'delay'=>500,
    					'minLength'=>2,
    					),
  						'htmlOptions'=>array(
     					'size'=>'20'
     					),
  						));*/

		     /* Added for ajax */
		  
		               
        ?>
        
        <table  border="1" style="width:100%">
        <tr valign="top">
        <td> Pick Up
        <?php
        echo $form->labelEx($model,'Shipper Name').$form->textField($model,'ShipperName',array('style'=>'width:250px'));
        echo $form->labelEx($model,'Pickup Date');
        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    	'name'=>'PichUpDate',
    	// additional javascript options for the date picker plugin
    	'options'=>array(
        'showAnim'=>'fold',
   		 ),
    	'htmlOptions'=>array(
        'style'=>'height:20px;'
    	),
		));
		 echo $form->labelEx($model,'Instructions').$form->textField($model,'Instructions',array('style'=>'width:250px'));
		 echo $form->labelEx($model,'BOL').$form->textField($model,'BOL',array('style'=>'width:250px'));
		 echo $form->labelEx($model,'Weight').$form->textField($model,'Weight',array('style'=>'width:250px'));
		 echo $form->labelEx($model,'Quality').$form->textField($model,'QuantityAmount',array('style'=>'width:150px'));
		 echo $form->dropDownList($model,'Quantity',array("1"=>"Active","0"=>"InActive"),array('empty'=>'Select Value'));
		 echo $form->labelEx($model,'Notes').$form->textArea($model, 'Details', array('maxlength' => 300, 'rows' => 6, 'cols' => 50));
         ?>
         </td>
        <td>
        
         Delivery 
         <?php 
         echo $form->labelEx($model,'Consignee').$form->textField($model,'Consignee',array('style'=>'width:250px'));
         echo $form->labelEx($model,'Delivery Date');
           $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    	'name'=>'DeliveryDate',
    	// additional javascript options for the date picker plugin
    	'options'=>array(
        'showAnim'=>'fold',
   		 ),
    	'htmlOptions'=>array(
        'style'=>'height:20px;'
    	),
		));
		
		 echo $form->labelEx($model,'Instructions2').$form->textField($model,'Instructions2',array('style'=>'width:250px'));
         ?>
         </td>
        </tr>
        </table>
        
     <?php echo $form->labelEx($model,'PrimaryFee').$form->textField($model,'PrimaryFee',array('style'=>'width:250px')); ?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->