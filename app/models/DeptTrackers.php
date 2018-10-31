<?php

class DeptTrackers extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $officers_oid;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("dept_trackers");
        $this->belongsTo('oid', 'Officers', 'oid', array('alias' => 'oidoff'));
        $this->hasManyToMany(
            'oid',
            'Tracking',
            'oid', 'payingid',
            'Paying',
            'payingid',
            array(
                'alias' => 'payingid'
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
    //     return 'dept_trackers';
    // }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DeptTrackers[]|DeptTrackers|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DeptTrackers|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getOfficers() {
        return $this->cidoff ;
    }

    public function getTracking() {
        return $this->payingid ;
    }
}
