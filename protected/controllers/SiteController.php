<?php

class SiteController extends Controller
{
    /**
     * Filters and access rules are used to grant or restrict access for selected users, actions
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            // closing search results for non-authorized users
            array('deny',
                'actions'=>array('search'),
                'users'=>array('?'),
            ),

            // I have closed a possibility to register and login
            // for already logged in and registered users
            array('deny',
                'actions'=>array('login', 'register'),
                'users'=>array('@'),
            ),
        );
    }

	/**
	 *  Added a captcha because of phrase "Security of the overall solution will be taken into account"
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// homepage
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
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
        $this->render('login',array('model'=>$model, 'showTask'=>true ));
	}

    /**
     * Registers a user
     */
    public function actionRegister()
    {
        $model=new registerForm;

        // collect user input data
        if(isset($_POST['RegisterForm']))
        {
            $model->attributes=$_POST['RegisterForm'];
            // validate user input and creates an entry if valid
            if($model->validate() && $model->checkPass() && $model->avoidDuplicateEmail())
                $model->addUser();
        }
        // display the registration form
        $this->render('register',array('model'=>$model));
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
     *  Search page
     */
    public function actionSearch($q='')
    {
        if($q == '') $result = null;
        else
        $result = User::model()->findAll(
            $condition = 'email LIKE :param OR username LIKE :param',
            $params = array(
                ':param' => "%".$q."%",
            )
        );
        $this->render('search',array('q'=>$q, 'result'=>$result));
    }
}