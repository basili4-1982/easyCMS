<?php

/* layout/main.twig */
class __TwigTemplate_0ea4fc62f2883a2e9192afcbdd1b680936bc4342e36166141e6bb98bc8491eb1 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
</head>
<body>
";
        // line 8
        $this->loadTemplate((isset($context["template"]) ? $context["template"] : null), "layout/main.twig", 8)->display($context);
        // line 9
        echo "</body>
</html>";
    }

    public function getTemplateName()
    {
        return "layout/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 9,  28 => 8,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>Title</title>*/
/* </head>*/
/* <body>*/
/* {% include template %}*/
/* </body>*/
/* </html>*/
