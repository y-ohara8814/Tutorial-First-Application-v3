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

/* tickets/create.twig */
class __TwigTemplate_85c8de220dd10a7f0a9b0eb087a964e41b6fc0c2691cf1bcb61d54fec891841a extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.twig", "tickets/create.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "  <form method=\"POST\" action=\"/tickets\">
     ";
        // line 4
        $this->loadTemplate("header.twig", "tickets/create.twig", 4)->display(twig_array_merge($context, ["title" => "チケット作成あああ"]));
        // line 5
        echo "     ";
        $this->loadTemplate("subject.twig", "tickets/create.twig", 5)->display(twig_array_merge($context, ["button" => "つくる"]));
    }

    public function getTemplateName()
    {
        return "tickets/create.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tickets/create.twig", "/Users/apple/Tutorial-First-Application-v3/templates/tickets/create.twig");
    }
}
