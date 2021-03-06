<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Room', 'doctrine');

/**
 * BaseRoom
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $designation
 * @property string $shortened_designation
 * @property string $comment
 * @property integer $building_id
 * @property Building $Building
 * @property Doctrine_Collection $Computer
 * @property Doctrine_Collection $Imputation
 * @property Doctrine_Collection $ReservationRoom
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method string              getDesignation()           Returns the current record's "designation" value
 * @method string              getShortenedDesignation()  Returns the current record's "shortened_designation" value
 * @method string              getComment()               Returns the current record's "comment" value
 * @method integer             getBuildingId()            Returns the current record's "building_id" value
 * @method Building            getBuilding()              Returns the current record's "Building" value
 * @method Doctrine_Collection getComputer()              Returns the current record's "Computer" collection
 * @method Doctrine_Collection getImputation()            Returns the current record's "Imputation" collection
 * @method Doctrine_Collection getReservationRoom()       Returns the current record's "ReservationRoom" collection
 * @method Room                setId()                    Sets the current record's "id" value
 * @method Room                setDesignation()           Sets the current record's "designation" value
 * @method Room                setShortenedDesignation()  Sets the current record's "shortened_designation" value
 * @method Room                setComment()               Sets the current record's "comment" value
 * @method Room                setBuildingId()            Sets the current record's "building_id" value
 * @method Room                setBuilding()              Sets the current record's "Building" value
 * @method Room                setComputer()              Sets the current record's "Computer" collection
 * @method Room                setImputation()            Sets the current record's "Imputation" collection
 * @method Room                setReservationRoom()       Sets the current record's "ReservationRoom" collection
 * 
 * @package    GENEPI
 * @subpackage model
 * @author     Pierre Boitel, Bastien Libersa, Paul Périé
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseRoom extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('room');
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
        $this->hasColumn('comment', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '250',
             ));
        $this->hasColumn('building_id', 'integer', 4, array(
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
        $this->hasOne('Building', array(
             'local' => 'building_id',
             'foreign' => 'id'));

        $this->hasMany('Computer', array(
             'local' => 'id',
             'foreign' => 'room_id'));

        $this->hasMany('Imputation', array(
             'local' => 'id',
             'foreign' => 'room_id'));

        $this->hasMany('ReservationRoom', array(
             'local' => 'id',
             'foreign' => 'room_id'));
    }
}