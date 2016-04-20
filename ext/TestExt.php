<?php

/**
 * Created by PhpStorm.
 * User: v.ahmedjanov
 * Date: 07.04.2016
 * Time: 11:33
 */
class TestExt extends Widget
{
        
    /**
     * Метод запускающий код виджета
     * @param $keyId - Ключ виджета по которому можно получить все настройки виджета
     */
    function run11($keyId)
    {
//        parent::init($keyId);
//
//        $setting=array(
//          'type_data_provider'=>Widget::TYPE_FUNC,
//           'name_data_provider'=>['Data','data']
//        );
//
//        $setting=array(
//            'type_data_provider'=>Widget::TYPE_ARRAY,
//            'name_data_provider'=>[1,2,3,4,5]
//        );
//
//        $setting=array(
//            'type_data_provider'=>Widget::TYPE_DB,
//            'name_data_provider'=>'menu',
//            'cond_data_provider'=>['id'=>['','>',':id']],
//            'params'=>[':id'=>'get@id']
//        );
//
////        $setting=array(
////            'type_data_provider'=>Widget::TYPE_SQL,
////            'name_data_provider'=>'SELECT * FROM menu WHERE id>:id',
////            'params'=>[':id'=>'get@id']
////        );
//        $this->saveSetting($keyId,$this->name,$setting);
//        $data=$this->getData($keyId,'test');
//
//        if (!empty($data))
//        {
//            $txt='';
//
//            foreach ($data as $item)
//            {
//
//                if (is_array($item)){
//                    $txt.=implode("\t",$item).PHP_EOL;
//                }
//                else{
//                    $txt.=$item.PHP_EOL;
//                }
//
//            }
//
//        }
//
//      return $txt;
    }

    function run($keyId)
    {
        return $this->name;
    }

}