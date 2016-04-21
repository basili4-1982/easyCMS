<?php

class PageController
{
    public $css=array();
    
    function __construct()
    {

        $this->css['list']=array(
            ADMIN_WEB.'/plugins/datatables/dataTables.bootstrap.css'
        );

        $this->css=array("asdqsdqwse");
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
        $pageTpl='pages/pages/list.php';
        $cssList=$this->css['list'];

        require ADMIN_PATH."/layout.php";
    }
}