<?php

class Account extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $cid;

    /**
     *
     * @var string
     */
    public $anumber;

    /**
     *
     * @var string
     */
    public $category;

    /**
     *
     * @var string
     */
    public $balance;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("account");
        $this->hasOne('cid', 'Customers', 'cid', array('alias' => 'cidcustomer')) ;
        $this->hasMany('account_id', 'Credit', 'account_id', array('alias' => 'accountcredit')) ;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */

    // comment
    // public function getSource()
    // {
    //     return 'account';
    // }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Account[]|Account|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Account|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getCustomers(){
        return $this->cidcustomer ;
    }

    public function getAccount(){
        return $this->accountcredit ;
    }

}
