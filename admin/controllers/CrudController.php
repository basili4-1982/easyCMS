<?php

//error_reporting(E_ALL);
//
//ini_set('display_errors', 1);

class CrudController
{
    public $css=array();

    protected $pages=[];
    protected $name;
    protected $model;

    public function __construct($model)
    {
        $this->model=$model;

        $this->css['list']=[
            ADMIN_WEB.'plugins/datatables/dataTables.bootstrap.css'
        ];

        $this->js['list']=[

            ADMIN_WEB.'dist/js/pages/page/list.js'
        ];

        $this->name=str_replace('controller','',strtolower(get_class($this)));
    }

    public function indexAction()
    {
        $id=isset($_GET['id'])?$_GET['id']:0;

        if ( empty($id) ){
            header('Location: '.ADMIN_WEB.'/index.php?p='.$this->name.'/list');
            exit();
        }

        $model=Store::model($this->model);
        $pageTpl=$this->pages['form'];

        $cssList=isset($this->css['form'])?$this->css['form']:null;
        $jsList=isset($this->js['form'])?$this->js['form']:null;


        require ADMIN_PATH."/layout.php";
    }

    public function listAction()
    {
        /**
         * @var  $model PageModel
         */
        $model=Store::model($this->model);

        // Шаблон старницы спиика
        $pageTpl=$this->pages['list'];
        // Стили
        $cssList=$this->css['list'];
        // JS
        $jsList=$this->js['list'];

        $items=$model->getList();

        require ADMIN_PATH."/layout.php";
    }

    public function editAction()
    {
        $id=isset($_GET['id'])?$_GET['id']:0;

        if ( empty($id) ){
            header('Location: '.ADMIN_WEB.'/index.php?p='.$this->name.'/list');
            exit();
        }

        /**
         * @var  $page PageModel
         */
        $model=Store::model($this->model);

        $pageTpl=$this->pages['form'];

        $cssList=isset($this->css['form'])?$this->css['form']:null;
        $jsList=isset($this->js['form'])?$this->js['form']:null;

        $form= new Form('#');

        $formData = $form->build_form(false);

        require ADMIN_PATH."/layout.php";
    }

    public function addTpl($url,$tpl)
    {
        $this->pages[$url]=$tpl;
    }
}