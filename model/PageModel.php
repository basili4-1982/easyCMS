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

        $this->addField(new Field('id',null,['list','one']));
        $this->addField(new Field('url',null,['list','one']));
        $this->addField(new Field('title',null,['list','one']));
        $this->addField(new Field('meta',null,['list','one']));
        $this->addField(new Field('layout',null,['list','one']));

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
    
   public function addField( Field $field )
    {
        foreach ($field->getScenarios() as $scenario){
            $this->fields[$scenario][]=$field;
        }
    }
}