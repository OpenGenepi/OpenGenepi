<?php

/**
 * ImputationArchive
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    epi
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class ImputationArchive extends BaseImputationArchive
{
	/**
	 * 
	 * @param $request
	 * @param $form
	 */
	public function fillAndSave(sfForm $form){
		
		if($form->getObject()->getImputation()->getImputationType() != ImputationDefaultValues::ACCOUNT_TRANSACTION_TYPE){
			//Fill informations:
			$this->fillImputation($form);
			
			//Save the new imputation archive entry:
			$this->save();
		}
		
	}
	
	
	/**
	 * 
	 * @param sfForm $form
	 */
	private function fillImputation(sfForm $form){
		
		// First, we get the objects we're gonna often need
		$object = $form->getObject();
		$imputation = $object->getImputation();
		
		//Fill the informations
		$this->setImputationDate($imputation->getDate());
		
		$this->setImputationType(Imputation::retrieveTypeAsString($imputation->getImputationType()));
		
		$this->setDuration(self::calculateDuration($form));
		
		$this->setDesignation($imputation->getAct()->getDesignation());
		
		$this->setPrice($imputation->getTotal());
		
		$this->setMethodOfPayment(self::retrieveDesignationFromId('ImputationMethodOfPayment', $imputation->getMethodOfPaymentId()));
		
		$this->setBuildingDesignation(self::retrieveDesignationFromId('Building', $imputation->getBuildingId()));
		
		$this->setRoomDesignation(self::retrieveDesignationFromId('Room', $imputation->getRoomId()));
		
		$this->setComputerName(self::retrieveComputerName($form));
		
		$this->setComputerTypeOfConnexion(self::retrieveComputerTypeOfConnexion($form));
		
		$this->setUserArchiveId(self::retrieveUserArchiveId($form));
		
		$this->setImputationId($imputation->getId());
	}
	
	
	/**
	 * 
	 * @param sfForm $form
	 */
	private static function calculateDuration(sfForm $form){
		
		//A duration is only set when the type of imputation is 'unitary service':
		if($form->getObject()->getImputation()->getImputationType() == ImputationDefaultValues::UNITARY_SERVICE_TYPE){
			
			$beginning_time = $form->getObject()->getBeginningTime();
			$end_time = $form->getObject()->getEndTime();
			
			return gmdate('H:i:s', strtotime($end_time) - strtotime($beginning_time));
			
		}else{
			//Otherwise, we set it to 0:
			return 0;
		}
	}
	
	
	/**
	 * This method returns the 'designation' field of the entry identified by the second argument
	 * of the table identified by the first argument.
	 * @param string $table
	 * @param integer $id
	 * @return the 'designation' field if the id (2nd argument) is not null and if it exists.
	 */
	private static function retrieveDesignationFromId($table, $id){
		
		if($id != null){
			$entry = Doctrine::getTable($table)
					->find($id);
	
			return $entry['designation'];
		}else{
			return null;
		}
	}
	
	
	/**
	 * 
	 * @param $form
	 */
	private static function retrieveComputerName(sfForm $form){
		
		//We can retrieve a computer name only if the type of imputation is 'unitary service':
		if($form->getObject()->getImputation()->getImputationType() == ImputationDefaultValues::UNITARY_SERVICE_TYPE){
			
			$computer = Doctrine::getTable('Computer')
						->find($form->getObject()->getComputerId());
						
			return $computer['name'];
			
		}else{
			//Otherwise, we set it to null:
			return null;
		}
	}
	
	
	
	/**
	 * 
	 * @param sfForm $form
	 */
	private static function retrieveComputerTypeOfConnexion(sfForm $form){
		
		//We can retrieve a computer name only if the type of imputation is 'unitary service':
		if($form->getObject()->getImputation()->getImputationType() == ImputationDefaultValues::UNITARY_SERVICE_TYPE){
			
			$type = Doctrine::getTable('Computer')
						->find($form->getObject()->getComputerId())
						->getComputerTypeOfConnexion()
						->getDesignation();
			
			return $type;
						
		}else{
			//Otherwise, we set it to null:
			return null;
		}
	}
	
	
	/**
	 * 
	 * @param sfForm $form
	 */
	private static function retrieveUserArchiveId(sfForm $form){
		
		$user_archive = Doctrine::getTable('UserArchive')
						->findOneByUserId($form->getObject()->getImputation()->getUserId());
						
		if($user_archive['id'] != null){
			return $user_archive['id'];
		}else{
			return 1;
		}
	}
}