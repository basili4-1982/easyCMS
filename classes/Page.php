<?php

/**
 * Created by PhpStorm.
 * User: basili4
 * Date: 31.03.2016
 * Time: 17:55
 */
class Page
{
    private $lodader;
    /**
     * @var Twig_Environment
     */
    private $twig;

    private $opt;

    private $tplPath;

    private $pageinfo=array();

    function __construct()
    {
        $this->opt=Config::getInstance()->getKey('page');

        $this->tplPath=ROOT_DIR.DIRECTORY_SEPARATOR."tpl";

        $this->lodader = new Twig_Loader_Filesystem($this->tplPath);
        $this->twig = new Twig_Environment($this->lodader, array(
            //'cache' => ROOT_DIR.DIRECTORY_SEPARATOR."cache",
            'debug' => true
        ));

        //$className=pathinfo($ext,PATHINFO_FILENAME);
        //$this->twig->addTokenParser( new $className);

        $this->twig->addTokenParser( new TwigWidget());
    }

    function view($url,$data=array())
    {
        $this->pageinfo=Store::model('Page')->pageInfo($url);

        $layout=$this->pageinfo['layout'];

        $layoutData=array();

        Debug::write('view');

        if ( !empty($data))
        {
            foreach ($data as $k=>$v)
            {
                $layoutData[$k]=$v;
            }
        }

        $layoutData['template']=$url.".twig";

        echo $this->twig->render("layout/".$layout.".twig",$layoutData);
        echo Debug::logPage();
    }

    function render($view,$data,$capiture=false)
    {

        $themeName=Config::getInstance()->getKey('themes');

        $themesPath='';

        if (!empty($themeName))
        {
            $themesPath='/themes/'.$themeName;
        }

        $viewData=array();

        if ( !empty($data))
        {
            foreach ($data as $k=>$v)
            {
                $viewData[$k]=$v;
            }
        }

        if (file_exists($this->tplPath."/".$themesPath."/"."{$view}.twig")){
            $cont=$this->twig->render($themesPath."/"."{$view}.twig",$viewData);
        }
        else{
            $cont=$this->twig->render("{$view}.twig",$viewData);
        }

        
        if ($capiture){
            return $cont;
        }else{
            echo $cont;
        }
    }
}