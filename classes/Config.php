<?php

/**
 * Created by PhpStorm.
 * User: basili4
 * Date: 01.04.2016
 * Time: 13:43
 */
class Config
{
    private static $instance;
    private $config;

    private function __construct()
    {

        $this->config=require CFG_FILE;
    }

    static function getInstance()
    {
        if ( is_null(self::$instance) )
        {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    public function getKey($key)
    {
        return isset( $this->config[$key] ) ? $this->config[$key] : null;
    }
}