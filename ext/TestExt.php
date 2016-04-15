<?php

/**
 * Created by PhpStorm.
 * User: v.ahmedjanov
 * Date: 07.04.2016
 * Time: 11:33
 */
class TestExt extends Widget
{

    protected $name;

    function __construct()
    {
        $this->name='test';
    }
    
    /**
     * Метод запускающий код виджета
     * @param $keyId - Ключ виджета по которому можно получить все настройки виджета
     */
    function run($keyId)
    {
        parent::init($keyId);

        var_dump($this->getSetting(1,$this->name));

        $this->saveSetting(2,$this->name,array(1,2));
//
//        var_dump($this->getSetting(1,$this->name));

//        $setting=array(
//          'type_data_provider'=>'',
//           'name_data_provider'=>serialize(array(1,3,5))
//        );
//
//        $this->saveSetting($keyId,$this->name,$setting);

        //$c=implode(',',$this->getSetting($keyId,'test'));

        //$data=$this->getData($keyId,'test');

//        var_dump($data);

//      foreach ($data as $item)
//      {
//        echo implode("\t",$item).PHP_EOL;
//      }

        return "разметка виджета $keyId";
    }
}