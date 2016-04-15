<?php

/**
 * Created by PhpStorm.
 * User: 1
 * Date: 01.04.2016
 * Time: 14:17
 */

define('CFG_FILE',__DIR__."/data/config.php");
require realpath(__DIR__.'/..').DIRECTORY_SEPARATOR."bootstrap.php";


class ConfigTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var $config Config
     */
    protected $config;

    protected function setUp()
    {
        $this->config=  Config::getInstance();
    }

    protected function setDown()
    {
        $this->config=null;
    }

    /**
     * @dataProvider providerGetKey
     */

    function testGetKey($key,$val)
    {
        $this->assertEquals($this->config->getKey($key),$val);
    }

    function providerGetKey()
    {
        return array(
            array('key','val'),
        );
    }
}
