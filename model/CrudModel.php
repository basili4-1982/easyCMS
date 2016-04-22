<?php

/***
 * контроллер обработки данных
 * Crud
 * Class CrudConroller
 */
class CrudConroller
{
    const TYPE_LIST='list';
    const TYPE_ONE='one';

    /***
     * @var $pdo PDO
     */
    private $pdo;

    protected $fields;

    public function __construct($pdo)
    {
        $this->pdo= $pdo;
    }

    /**
     * Возвражает спсиок полей изходя из типа запрашиваемых данных
     * @param $type одно из  значений  TYPE_LIST или TYPE_ONE
     */
    protected function getFields($type=self::TYPE_LIST)
    {
        if (isset($this->fields[$type])){
            return $this->fields[$type];
        }
        else {
            if ($type==self::TYPE_ONE){
                return $this->getFields(self::TYPE_LIST);
            }

            return ['*'];
        }
    }

    public function getList()
    {
        
        $sql="SELECT ".implode(',',$this->getFields(self::TYPE_LIST) ) ." FROM pages";

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItem($id)
    {

    }

    public function filter($filter)
    {

    }

}