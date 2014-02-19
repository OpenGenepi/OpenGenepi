<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('List', 'doctrine');

/**
 * BaseList
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $origin
 * @property integer $static
 * @property string $content
 * @property Doctrine_Collection $ListFilter
 * 
 * @method integer             getId()         Returns the current record's "id" value
 * @method string              getName()       Returns the current record's "name" value
 * @method integer             getType()       Returns the current record's "type" value
 * @method integer             getOrigin()     Returns the current record's "origin" value
 * @method integer             getStatic()     Returns the current record's "static" value
 * @method string              getContent()    Returns the current record's "content" value
 * @method Doctrine_Collection getListFilter() Returns the current record's "ListFilter" collection
 * @method List                setId()         Sets the current record's "id" value
 * @method List                setName()       Sets the current record's "name" value
 * @method List                setType()       Sets the current record's "type" value
 * @method List                setOrigin()     Sets the current record's "origin" value
 * @method List                setStatic()     Sets the current record's "static" value
 * @method List                setContent()    Sets the current record's "content" value
 * @method List                setListFilter() Sets the current record's "ListFilter" collection
 * 
 * @package    GENEPI
 * @subpackage model
 * @author     Pierre Boitel, Bastien Libersa, Paul Périé
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseList extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('list');
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
        $this->hasColumn('type', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('origin', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('static', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
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
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('ListFilter', array(
             'local' => 'id',
             'foreign' => 'list_id'));
    }
}