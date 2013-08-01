<?php

/* ::base.html.twig */
class __TwigTemplate_1466d2811055a4b617f85f71cf0b10a6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'bodys' => array($this, 'block_bodys'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<head>

    <meta charset=\"UTF-8\"/>

    <title>Bootstrap from Twitter</title>

    <meta name=\"viewport\" content=\"width-device-width initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmetest/bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmetest/bootstrap/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" />



    ";
        // line 17
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "12be9e0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_12be9e0_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/12be9e0_part_1_bootstrap_1.css");
            // line 20
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        } else {
            // asset "12be9e0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_12be9e0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/12be9e0.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        }
        unset($context["asset_url"]);
        // line 22
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "1db8630_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1db8630_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/1db8630_jquery_1.js");
            // line 27
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "1db8630_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1db8630_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/1db8630_jquery-ui_2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "1db8630_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1db8630_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/1db8630_main_3.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "1db8630"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1db8630") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/1db8630.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 29
        echo "    <link rel=\"stylesheet\" href=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery.ui.all.css\">



    <!-- HTML5 shim, for IE6-8 support of HTML elements -->
    <!-- (if it IE9 -->
    <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
    <!-- end if -->
</head>

<body>
<div class=\"container\">

    <div class=\"navbar nav-tabs\">
        <div class=\"container border\">
            <a class=\"brand\" href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("acme_index_homepage");
        echo "\">Index Symfony2</a>
            <a class=\"brand\" href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("admin");
        echo "\">Admin Symfony2</a>
        </div>
    </div>

    <div class=\"container well\">

        ";
        // line 51
        $this->displayBlock('body', $context, $blocks);
        // line 54
        echo "
    </div><!-- /container -->
</div>

<div class=\"container\">
    <div class=\"row\">
        <div id=\"content\" class=\"span12\">
            <!-- our main container -->
            ";
        // line 62
        $this->displayBlock('bodys', $context, $blocks);
        // line 64
        echo "        </div>

</body>
</html>
";
    }

    // line 51
    public function block_body($context, array $blocks = array())
    {
        // line 52
        echo "
        ";
    }

    // line 62
    public function block_bodys($context, array $blocks = array())
    {
        // line 63
        echo "            ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 63,  157 => 62,  152 => 52,  149 => 51,  141 => 64,  139 => 62,  129 => 54,  127 => 51,  118 => 45,  114 => 44,  97 => 29,  71 => 27,  66 => 22,  52 => 20,  41 => 13,  37 => 12,  33 => 11,  21 => 1,  68 => 22,  59 => 19,  55 => 18,  51 => 17,  48 => 17,  44 => 15,  31 => 4,  28 => 3,);
    }
}
