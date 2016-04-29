<?php

/**
 * Created by PhpStorm.
 * User: basili4
 * Date: 31.03.2016
 * Time: 19:18
 */
class Store
{
    private static $instace=null;

    private $pdo;

    static public  function getInstance()
    {
        if ( is_null(self::$instace) )
        {
            $database=Config::getInstance()->getKey('database');
            $opt=isset($database['options'])?$database['options']:null;

            self::$instace=  new Store($database['dsn'],$database['user'],$database['passwd'],$opt);
        }

        return self::$instace;
    }

    static public  function model($modelName)
    {
        $modelClass=$modelName."Model";
        $model=self::getInstance();
        return  new $modelClass($model->pdo);
    }
    
    private function __construct($dsn, $username, $passwd, $options)
    {

        try
        {
            $this->pdo=new PDO($dsn, $username, $passwd, $options);
            $this->pdo->exec('SET NAMES utf8');
            $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }catch (PDOException $e)
        {
            echo $e->errorInfo;
            exit("!!!!");
        }
    }
     
    public function getPdo()
    {
        return $this->pdo;
    }
}