<?php

define('ROOT_DIR',__DIR__);
$a=explode('/',__DIR__);
define('WEB_DIR','/'.array_pop($a)."/");
define('RUN_DIR',ROOT_DIR."/run");
define('CFG_DIR',ROOT_DIR."/config");
define('CFG_FILE',CFG_DIR."/config.php");


require ROOT_DIR."/classes/Autoload.php";
require ROOT_DIR."/vendor/autoload.php";

Twig_Autoloader::register();

// Авто загрузка классов
new Autoload();

// регистрация расширений twig

$page = new Page();





