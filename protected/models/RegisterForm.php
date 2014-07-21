<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'SiteController'.
 */

class RegisterForm extends CFormModel
{
    public $email;
    public $username;
    public $password;
    public $password2;
    public $verifyCode;

	/**
	 * Declares the validation rules.
	 * The rules state that email and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('email, password, password2, username', 'required'),
            array('username', 'length', 'max'=>32),
            array('email', 'email'),
			array('password', 'checkPass'), 			// password needs to be authenticated
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
	}


	/**
	 * Authenticates the password.
     * matches a passwords corresponding
     * returns hash with successful validation
	 */
	public function checkPass()
	{
            if($this->password == $this->password2)
            {
               return password_hash($this->password, PASSWORD_DEFAULT);
            }
            else $this->addError('password2','Please retype your password correctly');
	}


    /**
     * Authenticates email uniqueness
     * because of UNIQUE index on database column
     */
    public function avoidDuplicateEmail()
    {
        $query = "select * from `user` where `email`=:email";
        $query_category = Yii::app()->db->createCommand($query);
        $query_category->bindParam( ':email', $this->email);
        $results = $query_category->queryAll();

        if(count($results)>0)
        {
            $this->addError('email','This email already exists in database');
            return false;
        }
        else return true;
    }

    /**
	 * Creates a db entry
	 */
	public function addUser()
	{
        $user = new User();
        $user->email = $this->email;
        $user->username = $this->username;
        $user->password = $this->checkPass();

        if($user->save())
            Yii::app()->request->redirect('/site/login/success');
	}

    /**
     * Creates parameter for Verification Code
     */
    public function attributeLabels()
    {
        return array(
            'verifyCode'=>'Verification Code',
        );
    }
}
