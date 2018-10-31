<?php

class Tracking extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $oid;

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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("tracking");
        $this->belongsTo('oid','DeptTrackers', 'oid',array('alias' => 'alias_deptracker')) ;
        $this->belongsTo('cid','Customers', 'cid',array('alias' => 'alias_customer'));
        $this->belongsTo('loanid','LoanInformation', 'loanid',array('alias' => 'alias_loan')) ;
        $this->belongsTo('payingid','Paying', 'payingid',array('alias' => 'alias_paying')) ;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    // public function getSource()
    // {
    //     return 'tracking';
    // }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tracking[]|Tracking|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tracking|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getPaying() {
        return $this->alias_paying ;
    }

    public function getLoanInfomatio() {
        return $this->alias_Loan ;
    }

    public function getCustomers() {
        return $this->alias_customer ;
    }

    public function getDeptTracker() {
        return $this->alias_deptracker ;
    }
}
