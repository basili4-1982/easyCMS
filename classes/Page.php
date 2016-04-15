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

    private $pageinfo=array();

    function __construct($extFiles)
    {
        $this->opt=Config::getInstance()->getKey('page');

        $this->lodader = new Twig_Loader_Filesystem(ROOT_DIR.DIRECTORY_SEPARATOR."tpl");
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
}