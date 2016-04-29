<?php

class Form extends PhpFormBuilder
{
    protected $attributes=[];

    public function __construct($action, $args=[],$attributes=[])
    {
        $this->setAttributes($attributes);
        parent::__construct($action);

        $this->set_att('role','form');
    }

    public function addInputOfModel($name,$options=[])
    {
        /**
         * @var $model PageModel
         */
        $model=Store::model($name);

        $fields=[];

        if (isset($options['scenario'])){
            $fields=$model->getFieldsByScenario($options['scenario']);
        }

        /**
         * @var $field Field
         */

        foreach ($fields as $field){
            $opt=[
                'value'=>$this->getAttribute($field->getName()),
                'wrap_class'=>'form-group',
//                'before_html'=>'<div>',
//                'after_html'=>'</div>',
            ];
            $this->add_input($field->getLabel(),$opt);
        }
    }

    public function setAttributes($attributes=[])
    {
        $this->attributes=$attributes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getAttribute($name)
    {
        return $this->attributes[$name];
    }
}