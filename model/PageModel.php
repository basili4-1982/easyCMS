<?php

class PageModel extends CrudModel
{
       
   public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);

        $this->addField(new Field('id',null,['list','save','one']));
        $this->addField(new Field('url',null,['list','save','one']));
        $this->addField(new Field('title',null,['list','save','one']));
        $this->addField(new Field('meta',null,['list','save','one']));
        $this->addField(new Field('layout',null,['list','save','one']));
        $this->addField(new Field('descr',null,['save','one']));

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