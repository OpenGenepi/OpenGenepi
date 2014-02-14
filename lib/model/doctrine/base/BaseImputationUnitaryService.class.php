<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ImputationUnitaryService', 'doctrine');

/**
 * BaseImputationUnitaryService
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $number_of_unities
 * @property time $beginning_time
 * @property time $end_time
 * @property integer $computer_id
 * @property integer $imputation_id
 * @property Computer $Computer
 * @property Imputation $Imputation
 * 
 * @method integer                  getId()                Returns the current record's "id" value
 * @method integer                  getNumberOfUnities()   Returns the current record's "number_of_unities" value
 * @method time                     getBeginningTime()     Returns the current record's "beginning_time" value
 * @method time                     getEndTime()           Returns the current record's "end_time" value
 * @method integer                  getComputerId()        Returns the current record's "computer_id" value
 * @method integer                  getImputationId()      Returns the current record's "imputation_id" value
 * @method Computer                 getComputer()          Returns the current record's "Computer" value
 * @method Imputation               getImputation()        Returns the current record's "Imputation" value
 * @method ImputationUnitaryService setId()                Sets the current record's "id" value
 * @method ImputationUnitaryService setNumberOfUnities()   Sets the current record's "number_of_unities" value
 * @method ImputationUnitaryService setBeginningTime()     Sets the current record's "beginning_time" value
 * @method ImputationUnitaryService setEndTime()           Sets the current record's "end_time" value
 * @method ImputationUnitaryService setComputerId()        Sets the current record's "computer_id" value
 * @method ImputationUnitaryService setImputationId()      Sets the current record's "imputation_id" value
 * @method ImputationUnitaryService setComputer()          Sets the current record's "Computer" value
 * @method ImputationUnitaryService setImputation()        Sets the current record's "Imputation" value
 * 
 * @package    GENEPI
 * @subpackage model
 * @author     Pierre Boitel, Bastien Libersa, Paul Périé
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseImputationUnitaryService extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('imputation_unitary_service');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('number_of_unities', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('beginning_time', 'time', 25, array(
             'type' => 'time',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '25',
             ));
        $this->hasColumn('end_time', 'time', 25, array(
             'type' => 'time',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '25',
             ));
        $this->hasColumn('computer_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('imputation_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Computer', array(
             'local' => 'computer_id',
             'foreign' => 'id'));

        $this->hasOne('Imputation', array(
             'local' => 'imputation_id',
             'foreign' => 'id'));
    }
}