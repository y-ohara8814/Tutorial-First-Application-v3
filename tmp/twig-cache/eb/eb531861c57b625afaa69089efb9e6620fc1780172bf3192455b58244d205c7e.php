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

/* tickets/edit.twig */
class __TwigTemplate_89749da15941b833afe7b2bea79da811d94abd2e31e512efdf558786e639d968 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "tickets/edit.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "  <form method=\"POST\" action=\"/tickets/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "id", [], "any", false, false, false, 3), "html");
        echo "\">
     <input type=\"hidden\" name=\"_METHOD\" value=\"patch\">
     ";
        // line 5
        $this->loadTemplate("header.twig", "tickets/edit.twig", 5)->display(twig_array_merge($context, ["title" => "チケット編集"]));
        // line 6
        echo "     ";
        $this->loadTemplate("subject.twig", "tickets/edit.twig", 6)->display(twig_array_merge($context, ["subject" => twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "subject", [], "any", false, false, false, 6), "html"), "button" => "編集"]));
    }

    public function getTemplateName()
    {
        return "tickets/edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 6,  56 => 5,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tickets/edit.twig", "/Users/apple/Tutorial-First-Application-v3/templates/tickets/edit.twig");
    }
}
