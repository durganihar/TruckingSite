<?php



class DispatchForm extends CFormModel{
	

	private $licensePlateNumber;
	private $status;
	private $odometer;
	
	/*public $customerId;
	public $customerName;
	public $vehicle_type_id;
	public $vehicle_id;
	public $VehicleList='VehicleList';*/
	
	public function attributeLabels()
	{
		return array(
			'licensePlateNumber'=>'Vehicle Number',
		);
	}
	
	public function setLicensePlateNumber($LicenseString)
	{
		$this->licensePlateNumber=$LicenseString;
	}
	
	
	
	public function getLicensePlateNumber()
	{
		return $this->licensePlateNumber;
	}
	
	public function setStatus($statusString)
	{
		$this->status=$statusString;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function tableName()
	{
		return 'vehiclestypes';
	}
	
	
	public function setOdometer($odometer)
	{
		$this->odometer=$odometer;
	}
	
	public function getOdometer()
	{
		return $this->odometer;
	}
	
	
public function rules()
	{
		return array(
			// username and password are required
			array('customerId, customerName', 'required','message' => 'Please choose a CustomerName/Id'),
			
		);
	}
	
	
public function insertData(){
	$command = Yii::app()->db->createCommand();
	$command->insert('vehicles', array(
    'license_plate'=>$this->licensePlateNumber,
    'STATUS'=>$this->status,
));
}

public function getVehicles($typeid){
	
	$user = Yii::app()->db->createCommand()
    ->select('vehicles_id,license_plate')
    ->from('vehicles')
    ->where('vehicles_type_id = '.$typeid)
    ->queryAll();
	
       
  /* foreach ($user  as $key => $value){
   	    foreach ($value as $k => $v)
   	        echo $k." : ".$v;
   }*/
    
    
   return $user;

}
}
?>