<?php
/**
 * Created by PhpStorm.
 * User: v.ahmedjanov
 * Date: 21.04.2016
 * Time: 11:19
 */

$res=array();

function treeDir($path)
{

    global $res;


   $files=glob($path."/*");

    foreach ($files as $file){

        if (is_dir($file)){
            treeDir($file);
        }
        else{
            if (pathinfo($file,PATHINFO_EXTENSION)=='html')
            {
                $res[]=$file;
            }

        }

    }

    return $res;
}



$dirs=treeDir(__DIR__);


foreach ($dirs as $file){
    
    rename($file,str_replace('.php','.php',$file));
}