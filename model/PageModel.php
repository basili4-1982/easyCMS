<?php

/**
 * Created by PhpStorm.
 * User: 1
 * Date: 01.04.2016
 * Time: 16:47
 */
class PageModel
{
    /**
     * @var mysqli
    */
    private $db;

    function __construct($db)
    {
        $this->db= $db;
    }

    function pageInfo($url)
    {
        $sql='SELECT p.id,
                   p.url,
                   p.title,
                   p.meta,
                   p.layout 
            FROM pages p WHERE p.url="'.$url.'"';

        /**
         * @var mysqli_result
         */
        $r=$this->db->query($sql);
        return $r->fetch_assoc();
    }
}