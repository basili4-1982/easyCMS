<?php


class WidgetModel
{
    /***
     * @var $db mysqli
     */
    private $db;

    function __construct($db)
    {
        $this->db= $db;
    }

    function getSetting($idKey,$name)
    {
        $sql='SELECT ws.options 
              FROM 
                     widget_settings ws 
              WHERE 
                     ws.id_key=? 
              AND 
                    ws.name=?';

        $q=$this->db->prepare($sql);
        $q->bind_param(MYSQLI_TYPE_STRING,$idKey);
        $q->bind_param(MYSQLI_TYPE_STRING,$name);
        $q->execute();

        $row=$q->fetch(MYSQLI_ASSOC);

        if (!is_null($row['options'])){

            if ( !empty($row['options'])){
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

        $q=$this->db->prepare($sql);
        $q->bind_param(MYSQLI_TYPE_INT24,$idKey);
        $q->bind_param(MYSQLI_TYPE_STRING,$name);
        $q->bind_param(MYSQLI_TYPE_STRING,serialize($setting));
    }


    function getMaxKey($name)
    {
        $sql="SELECT MAX(ws.id_key) as `max` FROM  widget_settings ws WHERE ws.name=:name";

        $q=$this->db->prepare($sql);
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
        $this->db->beginTransaction();
        $max=$this->getMaxKey($name);

        try
        {
            $sql="INSERT HIGH_PRIORITY INTO widget_settings(id_key, name, options)   VALUES (:id, :name, '')";

            $q=$this->db->prepare($sql);
            $q->execute([':id'=>$max+1,':name'=>$name]);
        }
        catch (PDOException $e)
        {
            $this->db->rollBack();
            exit();
        }

        $this->db->beginTransaction();
        
        return $max+1;
    }

}