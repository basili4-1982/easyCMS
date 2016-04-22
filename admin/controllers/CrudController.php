<?php

//error_reporting(E_ALL);
//
//ini_set('display_errors', 1);

class CrudController
{
    public $css=array();

    protected $pages=[];
    protected $name;

    public function __construct()
    {
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

        require ADMIN_PATH."/layout.php";
    }

    public function listAction()
    {
        /**
         * @var  $page PageModel
         */
        $page=Store::model('Page');

        $pageTpl=$this->pages['list'];
        $cssList=$this->css['list'];
        $jsList=$this->js['list'];

        $pages=$page->getList();

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
        $page=Store::model('Page');

        $pageTpl=$this->pages['form'];
        $cssList=$this->css['form'];
        $jsList=$this->js['form'];
        
        //$page=$page->getList();

        require ADMIN_PATH."/layout.php";
    }

    public function addTpl($url,$tpl)
    {
        $this->pages[$url]=$tpl;
    }
}