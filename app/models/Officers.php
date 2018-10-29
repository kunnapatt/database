<?php

class Officers extends \Phalcon\Mvc\Model
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
    public $typeid;

    /**
     *
     * @var string
     */
    public $calender;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("officers");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'officers';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Officers[]|Officers|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Officers|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
