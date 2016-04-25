<?php

/* index.twig */
class __TwigTemplate_871b3233ef612a05b82c263c640ef245a9ee7bef750d6886d7fc38c39e6d7346 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1>Первая страница</h1>
<p>Обычная страница</p>

";
        // line 4
        $context["name"] = "asdasdas111";
        // line 5
        echo "
==";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "++
";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 6,  26 => 5,  24 => 4,  19 => 1,);
    }
}
/* <h1>Первая страница</h1>*/
/* <p>Обычная страница</p>*/
/* */
/* {% widget name="asdasdas111" %}*/
/* */
/* =={{ name }}++*/
/* */
