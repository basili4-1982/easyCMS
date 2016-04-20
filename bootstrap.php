<?php
/**
 * Created by PhpStorm.
 * User: basili4
 * Date: 31.03.2016
 * Time: 17:08
 */

define('ROOT_DIR',__DIR__);
define('WEB_DIR',__DIR__);
define('RUN_DIR',ROOT_DIR."/run");
define('CFG_DIR',ROOT_DIR."/config");
define('CFG_FILE',CFG_DIR."/config.php");


require ROOT_DIR."/classes/Autoload.php";
require ROOT_DIR."/vendor/autoload.php";

Twig_Autoloader::register();

// Авто загрузка клвссов
new Autoload();

// регистрация расширений twig

//  $ExtFiles=glob(ROOT_DIR.DIRECTORY_SEPARATOR.'ext'.DIRECTORY_SEPARATOR."*Ext.php");

$page = new Page();





