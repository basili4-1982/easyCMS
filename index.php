<?php
/**
 * 
 * Входной скрипт для фронта
 * 
 */

error_reporting(E_ALL);

ini_set('display_errors', 1);

require realpath(__DIR__).DIRECTORY_SEPARATOR."bootstrap.php";


$page->view(isset($_GET['p'])?$_GET['p']:'index');




