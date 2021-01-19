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

/* scroll.twig */
class __TwigTemplate_c21f8ea1a100ef96f21fdd22297b474f7988cbef371f169c63d13f80da15b6dc extends \Twig\Template
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
        echo "<!DOCTYPE html>
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
  <script src=\"https://code.jquery.com/jquery-2.2.4.min.js\"></script>
</head>

<body>
  <p>スクロール位置：<span id=\"scroll-amount\">0px</span></p>
  <div id=\"scroll-box\">
    <div id=\"scroll-contents\">スクロール領域</div>
  </div>
  <p>ボタンを押すとページの 300px の位置に移動します。</p>
  <button id=\"button\">移動する</button>
</body>

<style>
#scroll-box {
  overflow: scroll;
  height: 100px;
  border: 1px solid black;
}

#scroll-contents {
  height: 700px;
}
</style>

<script>
  \$('#scroll-box').scroll(function() {
    \$('#scroll-amount').text(\$(this).scrollTop() + 'px');
  });
  \$('#button').on('click', function(){
    \$(window).scrollTop(300);
  });
</script>

</html>
";
    }

    public function getTemplateName()
    {
        return "scroll.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "scroll.twig", "/Users/apple/Tutorial-First-Application-v3/templates/scroll.twig");
    }
}
