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

    private $db;

    static public  function getInstance()
    {
        if ( is_null(self::$instace) )
        {
            $database=Config::getInstance()->getKey('database');
            $opt=isset($database['options'])?$database['options']:null;
            self::$instace=  new Store($database['dbname'],$database['user'],$database['passwd'],$opt,$database['host']);
        }

        return self::$instace;
    }

    static public  function model($modelName)
    {
        $modelClass=$modelName."Model";
        return  new $modelClass(self::getInstance()->db);
    }
    
    private function __construct($dbname, $username, $passwd, $options,$host='localhost',$port=3306,$socket=null)
    {
        try{
            $this->db= new mysqli($host,$username, $passwd,$dbname,$port,$socket);

            if (empty($this->db))
            {
                throw( new Exception('Не могу соеденится'));
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }

    }
     
    public function getDb()
    {
        return $this->db;
    }
}