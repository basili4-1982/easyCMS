<?php
/**
 * Created by PhpStorm.
 * User: basili4
 * Date: 31.03.2016
 * Time: 16:36
 */

class Autoload
{
    function __construct()
    {
        spl_autoload_register([$this,'load']);
    }

     function load($className)
     {
         if ( strpos( $className,'Ext')!==false )
         {
             require ROOT_DIR."/ext/".$className.".php";
         }else
         if ( strpos( $className,'Model')!==false )
         {
             require ROOT_DIR."/model/".$className.".php";
         }
         else
            require ROOT_DIR."/classes/".$className.".php";
     }
}