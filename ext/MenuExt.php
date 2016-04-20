<?php

/**
 * Created by PhpStorm.
 * User: v.ahmedjanov
 * Date: 20.04.2016
 * Time: 16:59
 */
class MenuExt extends Widget
{
    public function run($keyId)
    {
        $this->init($keyId);
        return $this->render('menu');
    }
}