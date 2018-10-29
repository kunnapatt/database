<?php

class Loan information extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $loanid;

    /**
     *
     * @var string
     */
    public $loanamount;

    /**
     *
     * @var string
     */
    public $paypermounth;

    /**
     *
     * @var string
     */
    public $insterestrate;

    /**
     *
     * @var string
     */
    public $time;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mydb");
        $this->setSource("loan information");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'loan information';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Loan information[]|Loan information|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Loan information|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
