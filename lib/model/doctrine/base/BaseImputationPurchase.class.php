<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ImputationPurchase', 'doctrine');

/**
 * BaseImputationPurchase
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $number_of_unities
 * @property integer $imputation_id
 * @property Imputation $Imputation
 * 
 * @method integer            getId()                Returns the current record's "id" value
 * @method integer            getNumberOfUnities()   Returns the current record's "number_of_unities" value
 * @method integer            getImputationId()      Returns the current record's "imputation_id" value
 * @method Imputation         getImputation()        Returns the current record's "Imputation" value
 * @method ImputationPurchase setId()                Sets the current record's "id" value
 * @method ImputationPurchase setNumberOfUnities()   Sets the current record's "number_of_unities" value
 * @method ImputationPurchase setImputationId()      Sets the current record's "imputation_id" value
 * @method ImputationPurchase setImputation()        Sets the current record's "Imputation" value
 * 
 * @package    GENEPI
 * @subpackage model
 * @author     Pierre Boitel, Bastien Libersa, Paul Périé
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseImputationPurchase extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('imputation_purchase');
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
        $this->hasOne('Imputation', array(
             'local' => 'imputation_id',
             'foreign' => 'id'));
    }
}