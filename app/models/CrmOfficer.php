<?php

class CrmOfficer extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $oid;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("crm_officer");

        $this->belongTO('oid', 'officers', 'oid', array( 'alias' => 'cidofficer')) ;
        $this->hasManyToMany(
            'oid',
            'OfficerCampaign',
            'oid',
            'cid',
            'customers',
            'cid',
            array( 'alias' => 'cidoffcam')) ;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    // public function getSource()
    // {
    //     return 'crm_officer';
    // }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CrmOfficer[]|CrmOfficer|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CrmOfficer|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
    
    public function getOfficers(){
        return $this->cidofficer ;
    }

    public function getOfficerCampaign(){
        return $this->cidoffcam ;
    }
}
