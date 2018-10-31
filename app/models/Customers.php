<?php

class Customers extends \Phalcon\Mvc\Model
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
    public $fname;

    /**
     *
     * @var string
     */
    public $sname;

    /**
     *
     * @var string
     */
    public $dOB;

    /**
     *
     * @var string
     */
    public $gender;

    /**
     *
     * @var string
     */
    public $pnumber;

    /**
     *
     * @var string
     */
    public $homeaddress;

    /**
     *
     * @var string
     */
    public $workaddress;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("customers");
        $this->hasOne('cid','account','cid',array('alias' => 'alias_account'));
        $this->hasOne('cid','calendar','cid',array('alias' => 'alias_calendar'));
        $this->hasManyToMany(
            'cid',
            'Loanby',
            'cid', 'loanid',
            'LoanInformation',
            'loanid',
            array(
                'alias' => 'alias_loan'
            )
        );
        $this->hasManyToMany(
            'cid',
            'offercampaign',
            'cid', 'oid',
            'crmofficer',
            'oid',
            array(
                'alias' => 'alias_crm'
            )
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    // public function getSource()
    // {
    //     return 'customers';
    // }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Customers[]|Customers|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Customers|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getAccount()
    {
        return $this->alias_account;
    }

    public function getLoan()
    {
        return $this->alias_loan;
    }

    public function getCalendar()
    {
        return $this->alias_calendar;
    }
    
    public function getCrm()
    {
        return $this->alias_crm;
    }

}
