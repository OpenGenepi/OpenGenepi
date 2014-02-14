<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Login', 'doctrine');

/**
 * BaseLogin
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property integer $is_moderator
 * @property integer $locked
 * @property Doctrine_Collection $Moderator
 * @property Doctrine_Collection $User
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getLogin()        Returns the current record's "login" value
 * @method string              getPassword()     Returns the current record's "password" value
 * @method integer             getIsModerator()  Returns the current record's "is_moderator" value
 * @method integer             getLocked()       Returns the current record's "locked" value
 * @method Doctrine_Collection getModerator()    Returns the current record's "Moderator" collection
 * @method Doctrine_Collection getUser()         Returns the current record's "User" collection
 * @method Login               setId()           Sets the current record's "id" value
 * @method Login               setLogin()        Sets the current record's "login" value
 * @method Login               setPassword()     Sets the current record's "password" value
 * @method Login               setIsModerator()  Sets the current record's "is_moderator" value
 * @method Login               setLocked()       Sets the current record's "locked" value
 * @method Login               setModerator()    Sets the current record's "Moderator" collection
 * @method Login               setUser()         Sets the current record's "User" collection
 * 
 * @package    GENEPI
 * @subpackage model
 * @author     Pierre Boitel, Bastien Libersa, Paul Périé
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseLogin extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('login');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('login', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '20',
             ));
        $this->hasColumn('password', 'string', 40, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '40',
             ));
        $this->hasColumn('is_moderator', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '1',
             ));
        $this->hasColumn('locked', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '1',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Moderator', array(
             'local' => 'id',
             'foreign' => 'login_id'));

        $this->hasMany('User', array(
             'local' => 'id',
             'foreign' => 'login_id'));
    }
}