<?php

class Credit extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $cnumber;

    /**
     *
     * @var string
     */
    public $expire_date;

    /**
     *
     * @var string
     */
    public $limit;

    /**
     *
     * @var string
     */
    public $anumber;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("credit");
        $this->belongTo('account_id', 'Account', 'account_id', array( 'alias' => 'accountid' )) ;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    // public function getSource()
    // {
    //     return 'credit';
    // }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Credit[]|Credit|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Credit|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getAccount(){
        return $this->accountid ;
    }
}
