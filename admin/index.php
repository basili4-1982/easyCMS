<?php
require __DIR__."/config.php";
$p=isset($_GET['p'])?$_GET['p']:'index';


$list=explode('/',$p);

$controllerName=ucfirst($list[0]."Controller");

if (!isset($list[1])){
    $actionName='index';
}
else {
    $actionName=$list[1];
}

$actionName=strtolower($actionName);
$actionName.='Action';
require  ADMIN_PATH."/controllers/{$controllerName}.php";

$c = new $controllerName;
echo $c->{$actionName}();