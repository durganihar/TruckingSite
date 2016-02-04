<?php



class SiteController extends Controller
{
	public $layout='//layouts/column2';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
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

	/** 
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			
			
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	
	/**
	 * Action for dispatch_home page -- Added by Nihar
	 */
	 
	 public function actiondispatch()
	 {
	 	if(!Yii::app()->user->isGuest)
	 	  $this->render('dispatch');
	 	else
	 	  $this->redirect(Yii::app()->homeUrl);
	 }
	 
    public function actiondispatchAdd()
	 {
	    if(!Yii::app()->user->isGuest)
	    {
	 	  
	 	 $model=new DispatchForm1();
	 	 
	 	if(isset($_POST['DispatchForm1']))
		{
			$model->vehicle_type_id=$_POST['DispatchForm1']['vehicle_type_id'];
			$model->vehicle_type=$_POST['DispatchForm1']['vehicle_type'];
			
     		$model->insertData();
     					
		}
		
		 if(isset($_POST['Edit']))
		{
			echo "Dispatch id is".$_POST['Dispatch_Id'];
			echo "</br>Vehicle id is".$_POST['Vehicle_Id'];
			echo "</br>Customer id is".$_POST['Customer_Id'];
     					
		}
		
		 if(isset($_POST['View']))
		 {
		 	$this->dispatchDetails($_POST['Dispatch_Id'],$_POST['Vehicle_Id'],$_POST['Customer_Id']);
		   	return;
		 }
	 		 
	 		 	
	 	 $this->render('DispatchAdd',array('model'=>$model));
	    }
	    else{
	    	 $this->redirect(Yii::app()->homeUrl);
	    }
		
	 }
	 
     /** Added For Ajax **/
	 
	 /**
 	 * Serves a list of suggestions matching the term $term, in form of
     * a json-encoded object.
     * @param string $term the string to match
     */
     public function actionSuggest($term='')
     {
     	die("Heelo!");
  		$this->serveJson(Vehicles::model()->findMatches($term));
	 }
	 
	 public function serveJson($object)
	 {
  		$this->serveContent('application/json', CJSON::encode($object), false);
	 }
	 
	 public function serveContent($type, $content)
	 {
  		$this->_serve($type, $content, false);
	 }
	 
	/**
 	* Serves a file via HTTP.
 	* @param string $type the Internet Media Type (MIME) of the file
 	* @param string $file the file to send
 	*/  
	public function serveFile($type, $file)
	{
  		$this->_serve($type, $file, true);
	}

	/**
 	* Serves something via HTTP.
 	* @param string $type the Internet Media Type (MIME) of the content
 	* @param string $content the content to send
 	* @param boolean $is_file whether the content is a file
	 */  
	private function _serve($type, $content, $is_file=false)
	{
  	header("Content-Type: " . $type);
 	if ($is_file)
  	{
    	readfile($content);
  	}
  	else
 	 {
    	echo $content;
  	}
  	Yii::app()->end();
	}
	 
	  /** Added For Ajax **/

	 public function actionDispatchsView()
	 {
	 	$model=new DispatchForm1();
	 	
	 	if(!Yii::app()->user->isGuest)
	 	{
	 	  	  $this->render('DispatchsView',array('model'=>$model));
	 	}
	 	else{
	 	  	  $this->redirect(Yii::app()->homeUrl);
	 	}
	 }
	 
	public function actionDispatchDetails()
	{
		$this->render('DispatchDetails');
	}
	
	public function dispatchDetails($dispatch_id,$vehicle_id,$cust_id)
	{
		echo "dispatch_id is : ".$dispatch_id."</br>";
		echo "veh_id is : ".$vehicle_id."</br>";
		echo "cust_id is : ".$cust_id."</br>";
		$this->actionDispatchDetails();
	}
	
	
}