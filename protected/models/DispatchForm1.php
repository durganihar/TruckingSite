<?php
class DispatchForm1 extends CFormModel{
	
    private $licensePlateNumber;
    private $odometer;
    private $CustomerName;
    private $ShipperName;
    private $PichUpDate;
    private $Instructions;
    private $BOL;
    private $Weight;
    private $QuantityAmount;
    private $Quantity;
    private $Details;
    private $Consignee;
    private $DeliveryDate;
    private $Instructions2;
    private $PrimaryFee;
    private $Driver;
    
    
   public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
    }

    public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }
    
public function getVehicles($typeid){
	
	$user = Yii::app()->db->createCommand()
    ->select('vehicles_id,license_plate')
    ->from('vehicles')
    ->where('vehicles_type_id = '.$typeid)
    ->queryAll();

    return $user;
}
    
public function getAllDispatches()
{
	$details = Yii::app()->db->createCommand()
    ->select('Dispatch_id,vehicles_id,cust_id')
    ->from('dispatch')
    ->queryAll();

    return $details;
}
}