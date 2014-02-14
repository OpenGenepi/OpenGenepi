<?php

/**
 * Login
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    epi
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class Login extends BaseLogin
{
	public function setPassword($password){
		if($password){
			if (strlen($password) != 32){
				//if is not a md5 value, convert into it
				$password = md5('X21LE7PI12'.$password);
			} 
			return $this->_set('password', $password);
		}else{
			if($this->isNew()){
				return $this->_set('password', md5('X21LE7PI12'));
			}
		}
	}
	
	public function __toString()
  	{
  		if ($this->getLogin() != null) return $this->getLogin();
  		else return "";
  	}
}
