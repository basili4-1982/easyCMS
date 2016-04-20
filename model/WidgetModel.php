<?php


class WidgetModel
{
    /***
     * @var $pdo PDO
     */
    private $pdo;

   public function __construct($pdo)
    {
        $this->pdo= $pdo;
    }

   public  function getSetting($idKey,$name)
    {
        $sql='SELECT ws.options 
              FROM 
                     widget_settings ws 
              WHERE 
                     ws.id_key=:id 
              AND 
                    ws.name=:name';

        $q=$this->pdo->prepare($sql);
        $q->bindParam(':id',$idKey,PDO::PARAM_INT);
        $q->bindParam(':name',$name,PDO::PARAM_STR);
        $q->execute();

        $row=$q->fetch(PDO::FETCH_ASSOC);

        if (!is_null($row['options'])){

            if ( !empty($row['options'])){
                return unserialize( $row['options'] );
            }
            else{
                return null;
            }
        }
        else{
            return null;
        }
    }

   public function saveSetting($idKey,$name,$setting)
    {
        $sql="UPDATE widget_settings ws 
                  SET ws.options=:options
                  WHERE ws.id_key=:id AND ws.name=:name";

        try{
            $stmt=$this->pdo->prepare($sql);
            $stmt->bindParam(':id', $idKey, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':options', serialize($setting), PDO::PARAM_STR);
            $stmt->execute();
        }
        catch (Exception $e)
        {
            Debug::write($e->getMessage());
            return false;
        }

        return true;
    }

   public function getMaxKey($name)
    {
        $sql="SELECT MAX(ws.id_key) as `max` FROM  widget_settings ws WHERE ws.name=:name";

        $q=$this->pdo->prepare($sql);
        $q->bindParam(':name',$name);
        $q->execute();
        $d=$q->fetch(PDO::FETCH_ASSOC);

        if (isset($d['max']))
        {
            return !is_null($d['max'])?$d['max']:0;
        }

        return 0;
    }

   public function newKey($name)
    {
        $this->pdo->beginTransaction();
        $max=$this->getMaxKey($name);
        
        try
        {
            $sql="INSERT HIGH_PRIORITY INTO widget_settings(id_key, name, options)   VALUES (:id, :name, '')";

            $q=$this->pdo->prepare($sql);
            $q->execute([':id'=>$max+1,':name'=>$name]);
        }
        catch (PDOException $e)
        {
            $this->pdo->rollBack();
            exit();
        }
        $this->pdo->commit();

        return $max+1;
    }

   public function hasKey($idKey,$name)
   {
       $sql = "SELECT count(id_key) FROM widget_settings WHERE id_key=:id_key AND name=:name";

       $q=$this->pdo->prepare($sql);
       $q->execute([':id_key'=>$idKey,':name'=>$name]);

       return  $q->fetchColumn(0)>0;
   }
}