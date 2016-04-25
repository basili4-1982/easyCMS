<?php

class Form extends PhpFormBuilder
{
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
            $this->add_input($field->getLabel());
        }
    }

}