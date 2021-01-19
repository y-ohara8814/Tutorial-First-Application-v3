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

/* tickets/index.twig */
class __TwigTemplate_efed658970913c9cd35abed38e2582b828b7455561eb8c0674b3f40b0fa50138 extends \Twig\Template
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
        // line 2
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.twig", "tickets/index.twig", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "  ";
        $this->loadTemplate("header.twig", "tickets/index.twig", 4)->display(twig_array_merge($context, ["title" => "チケット一覧"]));
        // line 5
        echo "      <a href=\"/tickets/create\">新規作成</a>
        <ul class=\"list-group\">
            <?php foreach (\$tickets as \$ticket): ?>
            ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tickets"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["ticket"]) {
            // line 9
            echo "              <li class=\"list-group-item\">
                <a href=\"/tickets/";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ticket"], "id", [], "any", false, false, false, 10), "html", null, true);
            echo "\">
                  ";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ticket"], "subject", [], "any", false, false, false, 11), "html");
            echo "
                </a>
              </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ticket'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "        </ul>
      </div>
    </div>
  </div>
  ";
    }

    public function getTemplateName()
    {
        return "tickets/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 15,  69 => 11,  65 => 10,  62 => 9,  58 => 8,  53 => 5,  50 => 4,  46 => 3,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "tickets/index.twig", "/Users/apple/Tutorial-First-Application-v3/templates/tickets/index.twig");
    }
}
