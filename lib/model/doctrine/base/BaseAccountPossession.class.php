<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AccountPossession', 'doctrine');

/**
 * BaseAccountPossession
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $account_id
 * @property integer $user_id
 * @property Account $Account
 * @property User $User
 * 
 * @method integer           getAccountId()  Returns the current record's "account_id" value
 * @method integer           getUserId()     Returns the current record's "user_id" value
 * @method Account           getAccount()    Returns the current record's "Account" value
 * @method User              getUser()       Returns the current record's "User" value
 * @method AccountPossession setAccountId()  Sets the current record's "account_id" value
 * @method AccountPossession setUserId()     Sets the current record's "user_id" value
 * @method AccountPossession setAccount()    Sets the current record's "Account" value
 * @method AccountPossession setUser()       Sets the current record's "User" value
 * 
 * @package    epi
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseAccountPossession extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('account_possession');
        $this->hasColumn('account_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Account', array(
             'local' => 'account_id',
             'foreign' => 'id'));

        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}