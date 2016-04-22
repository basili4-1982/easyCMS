<?php


class PageModel extends CrudModel
{
    /***
     * @var $pdo PDO
     */
    private $pdo;
    
   public function __construct($pdo)
    {
        parent::__construct($pdo);

        $this->fields['list']=[
            'id',
            'url',
            'title',
            'meta',
            'layout'
        ];
        
        $this->table='pages';
        
    }

    public  function pageInfo($url)
    {
        $sql='SELECT p.id,
                   p.url,
                   p.title,
                   p.meta,
                   p.layout 
            FROM '.$this->table.' p WHERE p.url="'.$url.'"';
        
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
}