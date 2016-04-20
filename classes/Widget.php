<?php

class Widget
{
    const TYPE_DB=1;
    const TYPE_FUNC=2;
    const TYPE_ARRAY=3;
    const TYPE_SQL=4;

    public $idKey;

    protected $name;

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
                 $nameDataProvider=$options['name_data_provider'];

                // Класс модели и метод для получения данных
                list($modelName,$methodName)=$nameDataProvider;
                $rows=Store::model($modelName)->{$methodName}();
                break;
            }

            // Провайдер данных массив
            case self::TYPE_ARRAY:{
                $nameDataProvider=$options['name_data_provider'];
                if (!empty($nameDataProvider)){
                    $rows = $nameDataProvider;
                }
                else{
                    $rows = array();
                }
                break;
            }

            case self::TYPE_SQL:{
                $sql=$options['name_data_provider'];
                $pdo=Store::getInstance()->getPdo();
                if (!empty($sql))
                {
                    $q=$pdo->prepare($sql);
                    $params=[];
                    // Если есть параметры достаю парсю
                    if ( isset($options['params'])){
                        $params=$this->getParams($options['params']);
                    }
                    $q->execute($params);

                    $rows=$q->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $rows=[];
                }

                break;
            }

            // Провайдер данных таблица
            case self::TYPE_DB:{
                    // Падаю в дефолт
            }

            default:{
                $nameDataProvider=$options['name_data_provider'];
                $condDataProvider=$options['cond_data_provider'];

                $pdo=Store::getInstance()->getPdo();
                $sql='SELECT * FROM '.$nameDataProvider;

                if ( !empty($condDataProvider) )
                {
                    $cond=$condDataProvider;

                    $sql.=' WHERE ';

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

                $q=$pdo->prepare($sql);

                $params=[];
                if ( isset($options['params'])){
                    $params=$this->getParams($options['params']);
                }

                $q->execute($params);

                $rows=$q->fetchAll(PDO::FETCH_ASSOC);
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

       if (!$wm->hasKey($idKey,$this->name)){
           $this->idKey=$wm->newKey($this->name);
       }else{
           $this->idKey=$idKey;
       }
   }

    protected function getParams($params)
    {
        $res=[];

        foreach ($params as $key => $item)
        {
            $arrItem=explode('@',$item);

            $val=null;

            switch ( strtoupper($arrItem[0]) )
            {
                case 'GET':{
                    if (isset($arrItem[1])){
                        $val=isset($_GET[$arrItem[1]])?$_GET[$arrItem[1]]:'';
                    }
                    else{
                        Debug::write('В опциях нет параметра widgeta  '.$this->name,Debug::LEVEL_ERROR);
                    }
                    break;
                }

                case 'POST':{

                    if (isset($arrItem[1])){
                        $val=$_POST[$arrItem[1]];
                    }
                    else{
                        Debug::write('В опциях нет параметра widgeta  '.$this->name,Debug::LEVEL_ERROR);
                    }
                    break;
                }

                default :{
                    if (isset($arrItem[1])){
                        $val=$_REQUEST[$arrItem[1]];
                    }
                    else{
                        Debug::write('В опциях нет параметра widgeta  '.$this->name,Debug::LEVEL_ERROR);
                    }
                }
            }

            $res[$key]=$val;
        }

        return $res;
    }

}