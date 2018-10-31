<?php

class Paying extends \Phalcon\Mvc\Model
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
    public $loanid;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var string
     */
    public $amount;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("paying");
        $this->belongTo( 'cid', 'customers' , 'cid' , array( 'alias' => 'cidcustomer')) ;
        $this->belongTo( 'loanid', 'LoanInfomation', 'loanid', array( 'alias' => 'loanidloan')) ;
        $this->hasManyToMany(
            'payingid',
            'Tracking',
            'payingid',
            'oid',
            'DeptTracking',
            'oid',
            array( 'alias' => 'oiddept')
        ) ;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    // public function getSource()
    // {
    //     return 'paying';
    // }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Paying[]|Paying|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Paying|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getDeptTracking(){
        return $this->oiddept ;
    }

    public function getLoanInfomation() {
        return $this->loadidloan ;
    }

    public function getCustomers(){
        return $this->cidcustomer ;
    }
}
