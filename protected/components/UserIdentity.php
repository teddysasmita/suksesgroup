<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
      private $_id;
      private $_idlog;
      private $salt = "Jesus is the Way, the Truth and the Life";
      
	public function authenticate()
	{
		$users=array(
			// username => password
			'admin'=>'teamGSI2013'
		);
            /*
		if(!isset($users[$this->username]) || checkUsername($this->username))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		*/
            $this->checkUsername($this->username);
            if (isset($users[$this->username]) && $users[$this->username]===$this->password) {
               $this->errorCode=self::ERROR_NONE;
               $this->_id='admin';
            }   
            else if (!$this->checkUsername($this->username))
               $this->errorCode=self::ERROR_USERNAME_INVALID;
            else if (!$this->checkPassword($this->username, $this->password))
               $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
            else {
               $this->errorCode=self::ERROR_NONE;
               $this->_id=$this->retrieveId($this->username, $this->password);
            }
            return !$this->errorCode;
      }
      
      private function checkUsername($username)
      {
		$result = Yii::app()->authdb->createCommand()
			->select("count(*) as total")->from('users')
			->where('loginname = :p_loginname', array(':p_loginname'=>$username))
			->queryScalar();
		return $result > 0;
      }
      
      public static function getUserName()
      {
      	$name=Yii::app()->authdb->createCommand()
      		->select('fullname')->from('users')
      		->where('id=:p_id', array('p_id'=>Yii::app()->user->id))
			->queryScalar();
      	return $name;	
      }
      
      private function checkPassword($username, $userpass)
      {
		 $passkey = password_hash($userpass, PASSWORD_BCRYPT, array('salt'=>$this->salt));
         $result=Yii::app()->authdb->createCommand()->select('count(*) as total')
			->from('users')->where("passkey=:p_passkey and loginname=:p_loginname",
				array(":p_passkey"=>$passkey, ":p_loginname"=>$username))
			->queryScalar();
         return $result > 0;
      }
      
      private function retrieveId($username, $userpass)
      {
         $passkey = password_hash($userpass, PASSWORD_BCRYPT, array('salt'=>$this->salt));
         $result=Yii::app()->authdb->createCommand()->select('id')
			->from('users')->where("passkey=:p_passkey and loginname=:p_loginname",
				array(":p_passkey"=>$passkey, ":p_loginname"=>$username))
			->queryScalar();
         return $result;
      }
      
      public function getId() 
      {
        return $this->_id;
      }
      
      public function getIdlog()
      {
          return $this->_idlog;
      }
      
      public function initiateIdlog()
      {
          $idmaker=new idmaker();
          $this->_idlog=$idmaker->getCurrentID2();
          $data['id']=$this->_idlog;
          $data['idatetime']=$idmaker->getDateTime();
          $data['iduser']=$this->_id;
          $data['idlog']=$this->_idlog;
          $data['action']='i';
          $data['iplocation']=$_SERVER['REMOTE_ADDR'];
          Yii::app()->authdb->createCommand()->
             insert('userlog', $data);
      }
      
      public function closeIdlog()
      {
          $this->_idlog=idmaker::getCurrentID2();
          $data['id']=$this->_idlog;
          $data['idatetime']=idmaker::getDateTime();
          $data['iduser']=$this->_id;
          $data['idlog']=$this->_idlog;
          $data['action']='i';
          $data['iplocation']=$_SERVER['REMOTE_ADDR'];
          Yii::app()->authdb->createCommand()->
             insert('userlog', $data);
      }
      
      public function hostAllowed()
      {
          $count=Yii::app()->authdb->createCommand()->
             select()->from('userhosts')->where(array('and', 'iduser=:iduser', 'allowedip=:ip'),
                array(':iduser'=>$this->id, ':ip'=>$_SERVER['REMOTE_ADDR']))->queryScalar();
          return ($count>0);
      }
}
              
