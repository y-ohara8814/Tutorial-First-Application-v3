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

/* tickets/show.twig */
class __TwigTemplate_7f02c1f50a30d057aff95fa455fee02bab6e2ac77306c396506818ee9c65715f extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "tickets/show.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "  ";
        $this->loadTemplate("header.twig", "tickets/show.twig", 3)->display(twig_array_merge($context, ["title" => "チケット詳細"]));
        // line 4
        echo "        <table class=\"table table-bordered\">
          <thread>
            <tr>
              <th>ID</th>
              <th>件名</th>
              <th>LINK</th>
              <th>LINK</th>
            </tr>
          </thread>
          <tbody>
            <tr>
              <td>";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "id", [], "any", false, false, false, 15), "html");
        echo "</td>
              <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "subject", [], "any", false, false, false, 16), "html");
        echo "</td>
              <td><a class=\"popup-youtube\" href=\"https://www.youtube.com/watch?v=ppWj_7iiu04\"><img src=\"http://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Christmas_flood_1717.jpg/1280px-Christmas_flood_1717.jpg\" width=\"172\" height=\"105\" /></a></td>
              <td><a class=\"popup-image\" href=\"/image/miz8.jpg\">Sample Image</a></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan=\"2\">
                <a href=\"/tickets/";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "id", [], "any", false, false, false, 24), "html");
        echo "/edit\" class=\"btn btn-primary\" id=\"edit\">編集</a>
                <button class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#deleteModal\">削除</button>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <div class=\"modal fade\" id=\"deleteModal\" tableindex=\"-1\" role=\"dialog\">
    <div class=\"modal-dialog\" role=\"document\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\">チケットの削除</h5>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>
        <div class=\"modal-body\">
          <p>本当に削除してよろしいですか？</p>
        </div>
        <form method=\"post\" action=\"/tickets/";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "id", [], "any", false, false, false, 45), "html");
        echo "\">
          <input type=\"hidden\" name=\"_METHOD\" value=\"delete\">
          <div class=\"modal-footer\">
            <button type=\"submit\" class=\"btn btn-danger\">削除</button>
            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">キャンセル</button>
          </div>
        </form>
      </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "tickets/show.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 45,  81 => 24,  70 => 16,  66 => 15,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tickets/show.twig", "/Users/apple/Tutorial-First-Application-v3/templates/tickets/show.twig");
    }
}
