<?php


class PageModel
{
    /***
     * @var $pdo PDO
     */
    private $pdo;

   public function __construct($pdo)
    {
        $this->pdo= $pdo;
    }

    public  function pageInfo($url)
    {
        $sql='SELECT p.id,
                   p.url,
                   p.title,
                   p.meta,
                   p.layout 
            FROM pages p WHERE p.url="'.$url.'"';
        
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function getList()
    {
        $sql="SELECT p.id,
                   p.url,
                   p.title,
                   p.meta,
                   p.layout 
              FROM pages p";

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPage($id){
        
    }
}