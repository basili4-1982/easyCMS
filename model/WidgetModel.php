<?php


class WidgetModel
{
    /***
     * @var $pdo PDO
     */
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo= $pdo;
    }

    function getSetting($idKey,$name)
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
                //return unserialize( $row['options'] );
                return $row['options'];
            }
            else{
                return null;
            }
        }
        else{
            return null;
        }
    }

    function saveSetting($idKey,$name,$setting)
    {
        $sql="INSERT INTO widget_settings(id_key, name, options) VALUES (:id, :name, :options)";

        $sql2="INSERT INTO `widget_settings`(`id_key`, `name`, `options`) VALUE (2, 'asas', 'asdasd')";

        $setting="1";

        $db=$this->pdo;

        $db->exec($sql2) or die(print_r($db->errorInfo(), true));

//        $sh=$this->pdo->prepare($sql2);
//
//        var_dump($sh);
//
//        $sh->execute();
//
//        var_dump($this->pdo->errorInfo());

        exit("!!!111");

//        try{
//            $stmt = $this->pdo->prepare($sql);
////            $stmt->bindParam(':id', $idKey, PDO::PARAM_STR);
////            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
////            $stmt->bindParam(':options', $setting, PDO::PARAM_STR);
//            $stmt->execute([
//                            ':id'=>$idKey,
//                            ':name'=>$name,
//                            ':options'=>$setting
//                            ]);
//        }
//        catch (Exception $e)
//        {
//            echo $e->getMessage().PHP_EOL;
//            exit();
//        }
//        $q=$this->pdo->prepare($sql);
//        $q->bindParam(':id',$idKey);
//        $q->bindParam(':name',$name,PDO::PARAM_STR);
//        $q->bindValue(':options',"11",PDO::PARAM_STR);
//        //$q->bindValue(':options',serialize($setting),PDO::PARAM_STR);
//
//        var_dump($q);
//        $res=$q->execute();
//
//
//        if (!$res)
//        {
//            var_dump($this->pdo->errorInfo());
//        }
        //return $this->pdo->lastInsertId();
    }


    function getMaxKey($name)
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

    function newKey($name)
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

        return $max+1;
    }

}