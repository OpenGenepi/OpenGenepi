<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ActSubscription', 'doctrine');

/**
 * BaseActSubscription
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $duration
 * @property integer $max_members
 * @property float $extra_cost
 * @property Doctrine_Collection $Act
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method integer             getDuration()    Returns the current record's "duration" value
 * @method integer             getMaxMembers()  Returns the current record's "max_members" value
 * @method float               getExtraCost()   Returns the current record's "extra_cost" value
 * @method Doctrine_Collection getAct()         Returns the current record's "Act" collection
 * @method ActSubscription     setId()          Sets the current record's "id" value
 * @method ActSubscription     setDuration()    Sets the current record's "duration" value
 * @method ActSubscription     setMaxMembers()  Sets the current record's "max_members" value
 * @method ActSubscription     setExtraCost()   Sets the current record's "extra_cost" value
 * @method ActSubscription     setAct()         Sets the current record's "Act" collection
 * 
 * @package    epi
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseActSubscription extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('act_subscription');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('duration', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('max_members', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('extra_cost', 'float', 18, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '18',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Act', array(
             'local' => 'id',
             'foreign' => 'act_subscription_id'));
    }
}