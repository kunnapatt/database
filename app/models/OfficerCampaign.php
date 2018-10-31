<?php

class OfficerCampaign extends \Phalcon\Mvc\Model
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
    public $oid;

    /**
     *
     * @var string
     */
    public $ticketid;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("provide_information_to");
        $this->belongTo('oid', 'CrmOfficer', 'oid', array( 'alias' => 'oidcrm')) ;
        $this->belongTo('cid', 'Customers', 'cid', array( 'alias' => 'cidcustomer')) ;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    // public function getSource()
    // {
    //     return 'provide_information_to';
    // }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ProvideInformationTo[]|ProvideInformationTo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ProvideInformationTo|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getCustomers(){
        return $this->cidcustomer ;
    }

    public function getCrmOfficer(){
        return $this->oidcrm ;
    }
}
