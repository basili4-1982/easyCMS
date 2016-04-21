<?php
/**
 * Created by PhpStorm.
 * User: v.ahmedjanov
 * Date: 21.04.2016
 * Time: 13:43
 */

define('ADMIN_PATH',__DIR__);
define('ADMIN_WEB','/'.array_pop(explode('/',__DIR__))."/");
define('ROOT_DIR',realpath(ADMIN_PATH."/.."));

define('WEB_DIR','/'.array_pop(explode('/',ROOT_DIR))."/");
define('RUN_DIR',ROOT_DIR."/run");
define('CFG_DIR',ROOT_DIR."/config");
define('CFG_FILE',CFG_DIR."/config.php");


require ROOT_DIR."/classes/Autoload.php";
require ROOT_DIR."/vendor/autoload.php";

// Авто загрузка классов
new Autoload();