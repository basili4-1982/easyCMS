<?php

/***
 * контроллер обработки данных
 * Crud
 * Class CrudConroller
 */
class CrudModel
{
    /***
     * @var $pdo PDO
     */
    protected $pdo;

    public $table;

    protected $fields;

    public function __construct($pdo)
    {
        $this->pdo= $pdo;
    }

    /***
     * Возвражает спсиок полей изходя из типа запрашиваемых данных
     * @param $scenarios
     * @return array
     */
    public function getFieldsNameByScenario($scenarios)
    {
        $res=[];
        if (is_array($scenarios)){

            foreach ($scenarios as $scenario){
                /**
                 * @var $field Field
                 */

                foreach ($this->fields[$scenario] as $field){
                    $res[]=$field->getName();
                }
            }
        }else{
            if (isset($this->fields[$scenarios])){
                /**
                 * @var $field Field
                 */
                $fields=$this->fields[$scenarios];
                
                foreach ($fields as $field){
                    $res[]=$field->getName();
                }
            }
        }
        return $res;
    }

    public function getFieldsByScenario($scenarios)
    {
        $res=[];
        if (is_array($scenarios)){
            foreach ($scenarios as $scenario){
                $res[]=$this->fields[$scenario];
            }
            return $res;
        }else{
            if (isset($this->fields[$scenarios])){
                $res=$this->fields[$scenarios];
            }
        }
        return $res;
    }

    public function getList()
    {
        $sql="SELECT ".implode(',',$this->getFieldsNameByScenario('list') ) ." FROM ".$this->table;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItem($id)
    {
        $sql="SELECT ".implode(',',$this->getFieldsNameByScenario('one') ) ." FROM ".$this->table ." WHERE id=:id";

        $q=$this->pdo->prepare($sql);
        $q->execute([':id'=>$id]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function filter($filter)
    {

    }

    public function findByPk($pkKey)
    {
        if (is_scalar($pkKey)){
            return $this->getItem($pkKey);
        }
    }

}