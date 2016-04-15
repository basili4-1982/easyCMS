<?php

/**
 *  Класс вставляющий в код странцы результат работы расширения
 * Class TwigNode
 */
class TwigNode extends Twig_Node
{
    public function __construct($capture, Twig_NodeInterface $names, Twig_NodeInterface $values, $lineno, $tag = null)
    {
        parent::__construct(array('names' => $names, 'values' => $values), array('capture' => $capture, 'safe' => false), $lineno, $tag);

        if ($this->getAttribute('capture')) {
            $this->setAttribute('safe', true);

            $values = $this->getNode('values');
            if ($values instanceof Twig_Node_Text) {
                $this->setNode('values', new Twig_Node_Expression_Constant($values->getAttribute('data'), $values->getLine()));
                $this->setAttribute('capture', false);
            }
        }
    }

    /**
     *  Вставка результата работы расширения
     * @param Twig_Compiler $compiler
     */
    public function compile(Twig_Compiler $compiler)
    {
        $compiler->addDebugInfo($this);

        $names=$this->getNode('names');
        /**
         * @var $className  string  Имя класса расширения
         */
        $className=$names->nodes[0]->attributes['name']."Ext";

        $values=$this->getNode('values');
        // Ключ настроек расширения
        $idKey=$values->nodes[0]->attributes['value'];
        $w = new $className;
        $compiler->write("echo '".call_user_func(array($w,'run'),$idKey)."';");
    }
}