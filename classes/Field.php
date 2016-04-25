<?php

/***
 * Класс храненения столбцов в БД 
 * Class Field
 */

class Field
{
    protected $name;
    protected $label;
    protected $scenarios=[];

    public function __construct($name,$label=null,$scenarios=[])
    {
        $this->name=$name;
        $this->label=empty($label)?$name:$label;
        $this->scenarios=$scenarios;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param null $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return array
     */
    public function getScenarios()
    {
        return $this->scenarios;
    }

    /**
     * @param array $scenarios
     */
    public function setScenarios($scenarios)
    {
        $this->scenarios = $scenarios;
    }


}