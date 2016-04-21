<?php

class IndexController
{
    function indexAction()
    {
        $pageTpl='pages/main/index.php';
        require ADMIN_PATH."/layout.php";
    }
}