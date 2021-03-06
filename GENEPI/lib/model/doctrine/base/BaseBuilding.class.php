<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Building', 'doctrine');

/**
 * BaseBuilding
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $designation
 * @property string $shortened_designation
 * @property integer $address_id
 * @property Address $Address
 * @property Doctrine_Collection $Imputation
 * @property Doctrine_Collection $Room
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method string              getDesignation()           Returns the current record's "designation" value
 * @method string              getShortenedDesignation()  Returns the current record's "shortened_designation" value
 * @method integer             getAddressId()             Returns the current record's "address_id" value
 * @method Address             getAddress()               Returns the current record's "Address" value
 * @method Doctrine_Collection getImputation()            Returns the current record's "Imputation" collection
 * @method Doctrine_Collection getRoom()                  Returns the current record's "Room" collection
 * @method Building            setId()                    Sets the current record's "id" value
 * @method Building            setDesignation()           Sets the current record's "designation" value
 * @method Building            setShortenedDesignation()  Sets the current record's "shortened_designation" value
 * @method Building            setAddressId()             Sets the current record's "address_id" value
 * @method Building            setAddress()               Sets the current record's "Address" value
 * @method Building            setImputation()            Sets the current record's "Imputation" collection
 * @method Building            setRoom()                  Sets the current record's "Room" collection
 * 
 * @package    GENEPI
 * @subpackage model
 * @author     Pierre Boitel, Bastien Libersa, Paul Périé
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseBuilding extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('building');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('designation', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '45',
             ));
        $this->hasColumn('shortened_designation', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '20',
             ));
        $this->hasColumn('address_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Address', array(
             'local' => 'address_id',
             'foreign' => 'id'));

        $this->hasMany('Imputation', array(
             'local' => 'id',
             'foreign' => 'building_id'));

        $this->hasMany('Room', array(
             'local' => 'id',
             'foreign' => 'building_id'));
    }
}