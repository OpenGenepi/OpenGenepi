<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ListsFilter', 'doctrine');

/**
 * BaseListsFilter
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $list_id
 * @property integer $filter_id
 * @property integer $ordre
 * 
 * @method integer     getId()        Returns the current record's "id" value
 * @method integer     getListId()    Returns the current record's "list_id" value
 * @method integer     getFilterId()  Returns the current record's "filter_id" value
 * @method integer     getOrdre()     Returns the current record's "ordre" value
 * @method ListsFilter setId()        Sets the current record's "id" value
 * @method ListsFilter setListId()    Sets the current record's "list_id" value
 * @method ListsFilter setFilterId()  Sets the current record's "filter_id" value
 * @method ListsFilter setOrdre()     Sets the current record's "ordre" value
 * 
 * @package    GENEPI
 * @subpackage model
 * @author     Pierre Boitel, Bastien Libersa, Paul Périé
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseListsFilter extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('lists_filter');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('list_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('filter_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('ordre', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}