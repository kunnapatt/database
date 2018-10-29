<?php

class Calendar extends \Phalcon\Mvc\Model
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
    public $date;

    /**
     *
     * @var string
     */
    public $customers_cid;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("calendar");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'calendar';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Calendar[]|Calendar|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Calendar|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
