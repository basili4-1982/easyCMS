<?php

/**
 * Класс логера
 *  содержит методы
 * для логирования
 * и аудита системы.
 * логирования
 */
class Debug
{
    // уровни сообщений
    const LEVEL_TRACING=1; // трасеровка
    const LEVEL_DEBUG_INFO=2; // отладочные сообщения
    const LEVEL_INFO=3; // информациооные сообщения уведомления
    const LEVEL_ERROR=4; // ошибки

    protected $config;

    static protected $instace;

    protected $logWebPagePath;

    protected static function getInstance()
    {
        if ( is_null(self::$instace) )
        {
            $config=Config::getInstance();

            self::$instace = new Debug($config->getKey('debug'));
        }

        return self::$instace;
    }

    /**
     * Метод для помещения сообщений в оладочный лог
     * @param $message
     * @param int $level
     */
    static public function write($message,$level=self::LEVEL_DEBUG_INFO)
    {
        $ins=self::getInstance();
        $ins->writeToLog($message,$level);
    }

    static public function logPage()
    {
        $suffix='.webpage.log';
        $script_name=substr($_SERVER['SCRIPT_NAME'],1,-4);
        $file="{$script_name}{$suffix}";
        if ( file_exists(self::getInstance()->logWebPagePath.$file) )
        {
            $content=file_get_contents(self::getInstance()->logWebPagePath.$file);
            return "<hr><pre>$content</pre>";
        }
        return "";
    }

    /**
     * Debug constructor.
     * @param array $config конфигурация класса
     * [
     *  [Уровень отладки]=>способ хранения
     * ]
     */
    public function __construct($config=[])
    {
        // Настройки класса
        $this->config= $config;
        $this->logWebPagePath=RUN_DIR."/";

        // Удаляю логи страниц
        $this->deleteLogWebPage($this->logWebPagePath);
    }

    public function writeToLog($message,$level)
    {
        // Если в конфиге указаны правило для логирования применяем его
        if (isset($this->config[$level])){
            $methodWrite=$this->config[$level];
            call_user_func([$this,$methodWrite],$message);
        }
        else{
            // Если не указано применяем правило по умолчанию
            $this->writeToPage($message);
        }
    }

    public function writeToPage($message)
    {
        $suffix='.webpage.log';
        $script_name=substr($_SERVER['SCRIPT_NAME'],1,-4);
        $file="{$script_name}{$suffix}";

        $hFile=fopen($this->logWebPagePath.$file,'a');
        fwrite($hFile,$message.PHP_EOL);
        fclose($hFile);
    }

    protected function deleteLogWebPage($path)
    {
        $webPageLogs=glob($path."*.webpage.log");

        foreach ($webPageLogs as $file)
        {
            unlink($file);
        }
    }


}