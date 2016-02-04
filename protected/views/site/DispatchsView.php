
<div class="form">
<?php

echo "Inside dispatches view file!!";

$dispatchDetails = $model->getAllDispatches();

?>

<table>
<tr>
    <td> Dispatch Id </td>
    <td> Vehicle Id </td>
    <td> Customer Id </td>
    <td> Action      </td>
</tr>
<?php 
  $row=0;  
  $names = array("Dispatch_Id", "Vehicle_Id", "Customer_Id");
  foreach($dispatchDetails as $key=>$val){
  	echo "<tr>";  
  	$col=0;	
  	$form=$this->beginWidget('CActiveForm', array(
'id'=>'newsletter-form',
'action'=>Yii::app()->createUrl('//Site/DispatchAdd'),

'enableAjaxValidation'=>false,
));  
  	
 	foreach($val as $k=>$v)
 	{
    	echo "<td>".$v." <input type=\"hidden\" name=\"".$names[$col]."\" value=\"".$v."\" /></td>";
    	$col++;
 	}
 	$row++;
 	echo "<td><input type=\"submit\" name=\"Edit\"  value=\"Edit\"></td>";
 	echo "<td><input type=\"submit\" name=\"View\"  value=\"View\"></td>";
 	$this->endWidget(); 	
    echo"</tr>";	
  }

  
 /*  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vehiclestypes-grid',
	'dataProvider'=>$model->getAllDispatches1(),
	'filter'=>$model,
	'columns'=>array(
		'Dispatch Id',
		'Vehicle Id',
        'Customer Id',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
  */

?>
</table>


</div>