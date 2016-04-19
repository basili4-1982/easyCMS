<?php

class Widget
{
    const TYPE_DB=1;
    const TYPE_FUNC=2;
    const TYPE_ARRAY=3;

    public $idKey;

    public function run($keyId)
    {
        $this->init($keyId);
    }

   protected function getSetting($keyId,$name)
    {
        /**
         * @var $wm WidgetModel
         */
        $wm=Store::model('Widget');
        $setting =$wm->getSetting($keyId,$name);

        return !is_null($setting)?$setting:array();
    }

    protected function saveSetting($keyId,$name,$setting)
    {
        /**
         * @var $wm WidgetModel;
         */
        $wm=Store::model('Widget');
        $wm->saveSetting($keyId,$name,$setting);
    }


   protected function getData($keyId,$name)
    {
        $options=$this->getSetting($keyId,$name);
        // Тип источника данных
        $type=$options['type_data_provider'];

        switch ( $type )
        {
            // Провайдер данных функция
            case self::TYPE_FUNC:{
                    $nameDataProvider=unserialize($options['name_data_provider']);

                // Класс модели и метод для получения данных
                list($modelName,$methodName)=$nameDataProvider;
                $rows=Store::model($modelName)->{$methodName}();
                break;
            }

            // Провайдер данных массив
            case self::TYPE_ARRAY:{
                $nameDataProvider=$options['name_data_provider'];
                if (!empty($nameDataProvider)){
                    $rows = unserialize($nameDataProvider);
                }
                else{
                    $rows = array();
                }
                break;
            }

            // Провайдер данных таблица
            case self::TYPE_DB:{
                    // Падаю в дефолт
            }

            default:{
                $nameDataProvider=unserialize($options['name_data_provider']);
                $condDataProvider=$options['cond_data_provider'];

                $pdo=Store::getInstance()->getPdo();
                $sql='SELECT * FROM '.$nameDataProvider;

                if ( !empty($condDataProvider) )
                {
                    $cond=unserialize($condDataProvider);

                    foreach ( $cond as $field => $item)
                    {
                        /**
                         *  $link - AND или OR
                         * $operation - = > < => =<
                         *  $val значение
                         */

                        list($link,$operation,$val)=$item;

                        $sql.=" $link $field $operation $val ";
                    }
                }

                $rows=$pdo->query($sql);
                break;
            }
        }

        return $rows;
    }

   protected function init($idKey)
   {
        /**
         * @var $wm WidgetModel
         */
        $wm=Store::model('Widget');

       if (!$wm->hasKey($idKey)){
           $this->idKey=$wm->newKey($idKey);
       }else{
           $this->idKey=$idKey;
       }
   }

}