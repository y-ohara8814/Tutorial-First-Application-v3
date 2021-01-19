<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.twig */
class __TwigTemplate_58b3117edb976a87abb1e12d46973cc76a939440fcaccd6c185b39784321781f extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ja\">
<head>
  <meta charset=\"utf-8\"/>
  <title>チケット管理</title>
  <link href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\">
  <link rel=\"stylesheet\" href=\"/css/magnific-popup.css\">
</head>
<body>
<div class=\"container\">
  <h1>チケット管理</h1>
  ";
        // line 12
        $this->displayBlock('content', $context, $blocks);
        // line 13
        echo "</div>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js\"></script>
<script type=\"text/javascript\" src=\"/js/common.js\"></script>
<script src=\"/js/jquery.magnific-popup.min.js\"></script>
</body>
</html>
";
    }

    // line 12
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function getDebugInfo()
    {
        return array (  64 => 12,  53 => 13,  51 => 12,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.twig", "/Users/apple/Tutorial-First-Application-v3/templates/base.twig");
    }
}
