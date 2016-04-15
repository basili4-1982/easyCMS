<?php

/**
 * Created by PhpStorm.
 * User: 1
 * Date: 01.04.2016
 * Time: 16:47
 */
class PageModel
{
    /***
     * @var $pdo PDO
     */
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo= $pdo;
    }

    function pageInfo($url)
    {
        $sql='SELECT p.id,
                   p.url,
                   p.title,
                   p.meta,
                   p.layout 
            FROM pages p WHERE p.url="'.$url.'"';
        
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
}