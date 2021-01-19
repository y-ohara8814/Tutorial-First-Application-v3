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

/* subject.twig */
class __TwigTemplate_79625a67ef01d55ddae61a95716aa7add2e43557e68032d2e5251f8033cbba53 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"form-group\">
          <label for=\"subject\">件名</label>
          <input type=\"text\" name=\"subject\" id=\"subject\" class=\"form-control\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["subject"] ?? null), "html", null, true);
        echo "\">
        </div>
      </div>
    </div>
    <div class=\"card-body\">
      <button class=\"btn btn-primary\">";
        // line 8
        echo twig_escape_filter($this->env, ($context["button"] ?? null), "html", null, true);
        echo "</button>
    </div>
  </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "subject.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 8,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "subject.twig", "/Users/apple/Tutorial-First-Application-v3/templates/subject.twig");
    }
}
