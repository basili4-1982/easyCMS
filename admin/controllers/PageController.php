<?php

error_reporting(E_ALL);

ini_set('display_errors', 1);

class PageController extends CrudController
{
    public function __construct()
    {
        parent::__construct('Page');

        $this->addTpl('list','pages/pages/list.php');
        $this->addTpl('form','pages/pages/form.php');
        $this->addTpl('index','pages/pages/index.php');
    }

}