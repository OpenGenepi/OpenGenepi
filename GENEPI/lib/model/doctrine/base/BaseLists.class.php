<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Lists', 'doctrine');

/**
 * BaseLists
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property enum $type
 * @property enum $origin
 * @property integer $static
 * @property string $content
 * 
 * @method integer getId()      Returns the current record's "id" value
 * @method string  getName()    Returns the current record's "name" value
 * @method enum    getType()    Returns the current record's "type" value
 * @method enum    getOrigin()  Returns the current record's "origin" value
 * @method integer getStatic()  Returns the current record's "static" value
 * @method string  getContent() Returns the current record's "content" value
 * @method Lists   setId()      Sets the current record's "id" value
 * @method Lists   setName()    Sets the current record's "name" value
 * @method Lists   setType()    Sets the current record's "type" value
 * @method Lists   setOrigin()  Sets the current record's "origin" value
 * @method Lists   setStatic()  Sets the current record's "static" value
 * @method Lists   setContent() Sets the current record's "content" value
 * 
 * @package    GENEPI
 * @subpackage model
 * @author     Pierre Boitel, Bastien Libersa, Paul Périé
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseLists extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('lists');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '255',
             ));
        $this->hasColumn('type', 'enum', 1, array(
             'type' => 'enum',
             'fixed' => 0,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'W',
              1 => 'B',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '1',
             ));
        $this->hasColumn('origin', 'enum', 2, array(
             'type' => 'enum',
             'fixed' => 0,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'SI',
              1 => 'TO',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '2',
             ));
        $this->hasColumn('static', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '1',
             ));
        $this->hasColumn('content', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}