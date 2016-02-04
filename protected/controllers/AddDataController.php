<?php

class AddDataController extends Controller
{
	
   public function accessRules() {
        return array(
            array('allow',
                'actions' => array('actionaddVehicles'),
                'users' => array('*'),
            ),
        );
    }
	
	public function actionaddVehicles()
	{
		
	$model=new Vehicles;
	
	
	  if(!Yii::app()->user->isGuest)
	  {
	 	 if(isset($_POST['Vehicles']))
		 {
			//$model->vehicle_type_id=$_POST['DispatchForm']['vehicle_type_id'];
			//$model->vehicle_id=$_POST['DispatchForm']['vehicle_id'];
			
			$model->setLicensePlateNumber($_POST['Vehicles']['licensePlateNumber']);
			$model->setStatus($_POST['Vehicles']['status']);
			$model->insertData(Yii::app()->session['vehicleTypeId']);
     					
		}
		$this->render('addVehicles',array('model'=>$model));
	  }
	  else
	    $this->redirect(Yii::app()->user->returnUrl);
	}
	
	public function actionindex()
	{
		$this->render('index');
	}

		/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}