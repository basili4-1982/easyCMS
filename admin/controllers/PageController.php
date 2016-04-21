<?php

error_reporting(E_ALL);

ini_set('display_errors', 1);

class PageController
{
    public $css=array();
    
    function __construct()
    {
        $this->css['list']=[
            ADMIN_WEB.'plugins/datatables/dataTables.bootstrap.css'
        ];

        $this->js['list']=[

            ADMIN_WEB.'dist/js/pages/page/list.js'
        ];

    }

    function indexAction()
    {
        $id=isset($_GET['id'])?$_GET['id']:0;

        if ( empty($id) ){
            header('Location: '.ADMIN_WEB.'/index.php?p=page/list');
            exit();
        }

        $pageTpl='pages/pages/index.php';
        require ADMIN_PATH."/layout.php";
    }

    function listAction()
    {
        /**
         * @var  $page PageModel
         */
        $page=Store::model('Page');

        $pageTpl='pages/pages/list.php';
        $cssList=$this->css['list'];
        $jsList=$this->js['list'];

        $pages=$page->getList();

        require ADMIN_PATH."/layout.php";
    }

    function editAction()
    {
        $id=isset($_GET['id'])?$_GET['id']:0;

        if ( empty($id) ){
            header('Location: '.ADMIN_WEB.'/index.php?p=page/list');
            exit();
        }

        /**
         * @var  $page PageModel
         */
        $page=Store::model('Page');

        $pageTpl='pages/pages/form.php';

        $page=$page->getList();

        require ADMIN_PATH."/layout.php";
    }
}