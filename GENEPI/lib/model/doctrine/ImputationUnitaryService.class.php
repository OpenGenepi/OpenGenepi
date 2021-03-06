<?php

/**
 * ImputationUnitaryService
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    epi
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class ImputationUnitaryService extends BaseImputationUnitaryService
{
	/**
	 * 
	 * @param integer $user_id
	 * @param integer $moderator_id
	 * @param integer $act_id
	 * @param integer $act_public_category_id
	 */
	public function preConfigure($user_id, $moderator_id, $act_id, $act_public_category_id = null){
		
		ParametersConfiguration::setUserPrefix(sfContext::getInstance()->getUser()->getAttribute('login'));
		
		//Get the user:
	  	$user = Doctrine::getTable('User')
	  		->findOneById($user_id);
	  		
	  	//Get the moderator:
	  	$moderator = Doctrine::getTable('Moderator')
	  		->findOneById($moderator_id);
	  		
	  	//Get the act:
	  	//Get the moderator:
	  	$act = Doctrine::getTable('Act')
	  		->findOneById($act_id);
	  	
	  	//Set the user
	  	$this->getImputation()->setUser($user);
	  	
	  	//If the parameter "follow moderator actions" have been checked: set the moderator for the object ImputationAccountTransaction
	  	if(ParametersConfiguration::getDefault('default_follow_moderator')){
	  		$this->getImputation()->setModerator($moderator);
	  	}else{
	  		//Otherwise, set it to null:
	  		$this->getImputation()->setModeratorId(null);
	  	}
	  	
	  	//Set the act
	  	$this->getImputation()->setAct($act);
	  	
	  	//Set the imputation 'total' based on the act_price:
		$act_price = Doctrine::getTable('ActPrice')
		  				->findOneByActIdAndActPublicCategoryId($act_id, $act_public_category_id);
		  			
	  	if($act_price['value'] == -1){
	  		$this->getImputation()->setTotal(0);
	  	}else{
	  		$this->getImputation()->setTotal($act_price['value']);
	  	}
	  	
	  	//Set the 'number of unities' by default to 1:
	  	$this->setNumberOfUnities(1);
	  	
	  	//Set the date (today by default):
	  	$this->getImputation()->setDate(date('m/d/Y H:i'));
	  	
	  	//Set the end_time (current hour by default):
	  	$this->setEndTime(date('H:i'));
	  	
	  	//Set the beginning time:
	  	$this->setBeginningTimeConf($act['duration']);
	  	
	  	//Set the room, building, computer, method of payment and unity id:
	  	$this->getImputation()->setRoomId(ImputationDefaultValues::getDefaultValueByType(
	  			ImputationDefaultValues::DEFAULT_ROOM, ImputationDefaultValues::UNITARY_SERVICE_TYPE));
	  			
	  	$this->getImputation()->setBuildingId(ImputationDefaultValues::getDefaultValueByType(
	  			ImputationDefaultValues::DEFAULT_BUILDING, ImputationDefaultValues::UNITARY_SERVICE_TYPE));
	  			
	  	$this->setComputerId(ParametersConfiguration::getDefault('default_computer'));
	  			
	  	$this->getImputation()->setMethodOfPaymentId(ParametersConfiguration::getDefault('default_method_of_payment'));
	  	
	  	$this->getImputation()->setUnityId(ParametersConfiguration::getDefault('default_currency'));
	  			
	  	//Set the imputation type to 2:
	  	$this->getImputation()->setImputationType(ImputationDefaultValues::UNITARY_SERVICE_TYPE);
	}
	
	
	/**
	 * 
	 * @param unknown_type $act_duration
	 */
	public function setBeginningTimeConf($act_duration){
		
		$duration = $act_duration;
		
	  	$duration = explode(':', $duration);
	  	$duration_min = intval($duration[0]);
	  	$duration_hours = intval($duration[1]);
	  	
	  	$end_time = explode(':', $this->getEndTime());
	  	$end_time_hours = intval($end_time[0]);
	  	$end_time_min = intval($end_time[1]);
	  	
	  	$diff_time_hours = $end_time_hours - $duration_hours;
	  	$diff_time_min = $end_time_min - $duration_min;
	  	
	  	return parent::_set('beginning_time',$diff_time_hours.':'.$diff_time_min);
		
	}
}
