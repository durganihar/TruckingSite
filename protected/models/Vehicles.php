<?php

/**
 * This is the model class for table "vehicles".
 *
 * The followings are the available columns in table 'vehicles':
 * @property integer $vehicles_id
 * @property integer $vehicles_type_id
 * @property integer $motor_carrier_num
 * @property string $make
 * @property integer $model_Year
 * @property string $STATUS
 * @property string $license_plate
 * @property string $license_exp
 * @property string $Inspection_exp
 * @property string $VIn
 * @property string $Description
 * @property string $Year_Purchased
 * @property string $Initial_location
 * @property integer $org_id
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 */
class Vehicles extends CFormModel
{
	
	private $licensePlateNumber;
	private $status;
	private $odometer;
		
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicles';
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
	public function setOdometer($odometer)
	{
		$this->odometer=$odometer;
	}
	
	public function getOdometer()
	{
		return $this->odometer;
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			/*array('vehicles_id, vehicles_type_id, motor_carrier_num, model_Year, org_id', 'numerical', 'integerOnly'=>true),
			array('make, STATUS, license_plate, VIn, Description, Year_Purchased, Initial_location, created_by, updated_by', 'length', 'max'=>255),
			array('license_exp, Inspection_exp, created_date, updated_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vehicles_id, vehicles_type_id, motor_carrier_num, make, model_Year, STATUS, license_plate, license_exp, Inspection_exp, VIn, Description, Year_Purchased, Initial_location, org_id, created_by, created_date, updated_by, updated_date', 'safe', 'on'=>'search'),
		*/
		
		array('licensePlateNumber', 'required'),
		);
		
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vehicles_id' => 'Vehicles',
			'vehicles_type_id' => 'Vehicles Type',
			'motor_carrier_num' => 'Motor Carrier Num',
			'make' => 'Make',
			'model_Year' => 'Model Year',
			'STATUS' => 'Status',
			'license_plate' => 'License Plate',
			'license_exp' => 'License Exp',
			'Inspection_exp' => 'Inspection Exp',
			'VIn' => 'Vin',
			'Description' => 'Description',
			'Year_Purchased' => 'Year Purchased',
			'Initial_location' => 'Initial Location',
			'org_id' => 'Org',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'updated_by' => 'Updated By',
			'updated_date' => 'Updated Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('vehicles_id',$this->vehicles_id);
		$criteria->compare('vehicles_type_id',$this->vehicles_type_id);
		$criteria->compare('motor_carrier_num',$this->motor_carrier_num);
		$criteria->compare('make',$this->make,true);
		$criteria->compare('model_Year',$this->model_Year);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('license_plate',$this->license_plate,true);
		$criteria->compare('license_exp',$this->license_exp,true);
		$criteria->compare('Inspection_exp',$this->Inspection_exp,true);
		$criteria->compare('VIn',$this->VIn,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Year_Purchased',$this->Year_Purchased,true);
		$criteria->compare('Initial_location',$this->Initial_location,true);
		$criteria->compare('org_id',$this->org_id);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('updated_date',$this->updated_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vehicles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
public function insertData($vehicleTypeId){
	$command = Yii::app()->db->createCommand();
	$command->insert('vehicles', array(
    'license_plate'=>$this->licensePlateNumber,
    'STATUS'=>$this->status,
	'vehicles_type_id'=>$vehicleTypeId
));
}


  /** Added for Ajax **/

/**
 * Retrieves tags that match a term.
 * @param string $term a term to use for matching tags.
 * @return array tags titles that match the term.
 */
public function findMatches($term='')
{
  if(''==$term)
  {
   return array();
  }
  $q = new CDbCriteria();
  $q->addSearchCondition('license_plate', $term);
  $q->select=array('license_plate');
  $tags = self::model()->findAll($q);

  $results=array();
  foreach($tags as $tag)
  {
    $results[]=$tag->license_plate;
  }
  return $results;
}

  /** Added for Ajax **/



}
