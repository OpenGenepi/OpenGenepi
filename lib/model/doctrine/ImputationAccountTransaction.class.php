<?php

/**
 * ImputationAccountTransaction
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    epi
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class ImputationAccountTransaction extends BaseImputationAccountTransaction
{
	/**
	 * 
	 * @param unknown_type $user_id
	 * @param unknown_type $moderator_id
	 */
	public function preConfigure($user_id, $moderator_id){
		
		ParametersConfiguration::setUserPrefix(sfContext::getInstance()->getUser()->getAttribute('login'));
		
		//Get the user:
	  	$user = Doctrine::getTable('User')
	  		->findOneById($user_id);
	  		
	  	//Get the moderator:
	  	$moderator = Doctrine::getTable('Moderator')
	  		->findOneById($moderator_id);
	  	
	  	//Set the user for the object ImputationAccountTransaction
	  	$this->getImputation()->setUser($user);
	  	
	  	//If the parameter "follow moderator actions" have been checked: set the moderator for the object ImputationAccountTransaction
	  	if(ParametersConfiguration::getDefault('default_follow_moderator')){
	  		$this->getImputation()->setModerator($moderator);
	  	}else{
	  		//Otherwise, set it to null:
	  		$this->getImputation()->setModeratorId(null);
	  	}
	  	
	  	//Set the date (today by default):
	  	$this->getImputation()->setDate(date('m/d/Y H:i'));
	  	
	  	//Set the room, building, method of payment and unity id:
	  	$this->getImputation()->setRoomId(ImputationDefaultValues::getDefaultValueByType(
	  			ImputationDefaultValues::DEFAULT_ROOM, ImputationDefaultValues::ACCOUNT_TRANSACTION_TYPE));
	  			
	  	$this->getImputation()->setBuildingId(ImputationDefaultValues::getDefaultValueByType(
	  			ImputationDefaultValues::DEFAULT_BUILDING, ImputationDefaultValues::ACCOUNT_TRANSACTION_TYPE));
	  			
	  	$this->getImputation()->setMethodOfPaymentId(ParametersConfiguration::getDefault('default_method_of_payment'));
	  	
	  	$this->getImputation()->setUnityId(ParametersConfiguration::getDefault('default_currency'));
	  			
	  	//Set the act id to null:
	  	$this->getImputation()->setActId(null);
	  	
	  	//Set the imputation type to 1:
	  	$this->getImputation()->setImputationType(ImputationDefaultValues::ACCOUNT_TRANSACTION_TYPE);
	}
	
	/**
	 * 
	 * @param unknown_type $user_id
	 */
	public static function getUserAccountValues($user_id){
		
		$userAccounts = Doctrine::getTable('AccountUser')->findByUserId($user_id);
	  	
	  	$user_account_values = array(0 => 0);
	  	
	  	foreach($userAccounts as $userAccount){
	  		$user_account_values[$userAccount->getAccount()->getId()] = $userAccount->getAccount()->getValue();
	  	}
	  	
	  	return $user_account_values;
	}
	
	
/**
	 * 
	 * @param unknown_type $user_id
	 */
	public static function getUserAccountUnities($user_id){
		
		$userAccounts = Doctrine::getTable('AccountUser')->findByUserId($user_id);
	  	
	  	$user_account_unities = array(0 => 0);
	  	
	  	foreach($userAccounts as $userAccount){
	  		$user_account_unities[$userAccount->getAccount()->getId()] = $userAccount->getAccount()->getAct()->getUnity()->getShortenedDesignation();
	  	}
	  	
	  	return $user_account_unities;
	}
	
	
	/**
	 * 
	 * @param array $params
	 * @param integer $type
	 */
	public static function unsetFieldsByType($params, $type){
		
		switch($type){
			case ImputationDefaultValues::PURCHASE_TYPE:
				unset($params['number_of_unities']);
				break;
				
			case ImputationDefaultValues::COUNTABLE_SERVICE_TYPE:
				unset($params['initial_value']);
				unset($params['account']);
				break;
				
			case ImputationDefaultValues::UNITARY_SERVICE_TYPE:
				unset($params['number_of_unities']);
				unset($params['beginning_time']);
				unset($params['end_time']);
				unset($params['computer_id']);
				break;
				
			case ImputationDefaultValues::SUBSCRIPTION_TYPE:
				unset($params['number_of_members']);
				unset($params['final_date']);
				break;
				
			default:
				break;
		}
		
		unset($params['imputation']['room_id']);
	    unset($params['imputation']['building_id']);
	    unset($params['imputation']['act_id']);
	    unset($params['_csrf_token']);
		
		
		return $params;
	}
	
	
	
	/**
	 * 
	 * @param $parameters
	 */
	public static function buildAndSaveTransactionFrom($parameters){
		

	    	/* --- Duplicate the parameters: --- */
	    		
	    		$parameters_account_transaction = $parameters;
	    		
	    		
	    		
	    		
	    	/* --- Change the parameters: --- */
	    		
	    		/* --- Unset those who do not correspond to an account transaction: --- */
	    		$parameters_account_transaction = ImputationAccountTransaction::unsetFieldsByType($parameters_account_transaction, $parameters_account_transaction['imputation']['imputation_type']);
	    		

	    		
	    		/* --- Add the missing ones: --- */
	    		$parameters_account_transaction['sum'] = $parameters_account_transaction['imputation']['total'];
	    			    		
	    		
	    		/* --- Modify those who need to be modified --- */
	    		$parameters_account_transaction['imputation']['imputation_type'] = ImputationDefaultValues::ACCOUNT_TRANSACTION_TYPE;
	    		$parameters_account_transaction['imputation']['total'] = -$parameters_account_transaction['imputation']['total'];
	    		
	    		
	    		
	    	/* --- Create a form of type 'account transaction': --- */
	    		
	    		$transaction = new ImputationAccountTransaction();
				$transaction->getImputation()->setUserId($parameters_account_transaction['imputation']['user_id']);
				
				$form_account_transaction = new ImputationAccountTransactionForm($transaction, array('culture' => ParametersConfiguration::getDefault('default_language')));
    			
    			
				//Bind the form to the new parameters:
				$form_account_transaction->bind($parameters_account_transaction);
				
				//Save it if it's valid:
				if( ($form_account_transaction->isValid()) && ($parameters['imputation']['account_id'] != 0) ){
				
					/* --- Decrement the corresponding account: --- */
			    		$account = Doctrine::getTable('Account')->find($parameters['imputation']['account_id']);
			    		$account->setValue($account->getValue() - $parameters['imputation']['total']);
			    		$account->save();
			    		
					$form_account_transaction->save();
					return true;
				}else{
					return false;
				}
	}
}
