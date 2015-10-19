<?php

/* themes/omega/omega/templates/html.html.twig */
class __TwigTemplate_a7d6062b6d15d4fafdd19f847080ff96802ce08e8c11d0732b27c98531ec3326 extends Twig_Template
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
        // line 29
        echo "<!DOCTYPE html>
<html";
        // line 30
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["html_attributes"]) ? $context["html_attributes"] : null), "html", null, true);
        echo ">
  <head>
    ";
        // line 32
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["head"]) ? $context["head"] : null), "html", null, true);
        echo "
    <title>";
        // line 33
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["head_title"]) ? $context["head_title"] : null), "html", null, true);
        echo "</title>
    ";
        // line 34
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["styles"]) ? $context["styles"] : null), "html", null, true);
        echo "
    ";
        // line 35
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["scripts"]) ? $context["scripts"] : null), "html", null, true);
        echo "
  </head>
  <body";
        // line 37
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attributes"]) ? $context["attributes"] : null), "html", null, true);
        echo ">
    <a href=\"#main-content\" class=\"visually-hidden focusable skip-link\">
      ";
        // line 39
        echo $this->env->getExtension('drupal_core')->renderVar(t("Skip to main content"));
        echo "
    </a>
    ";
        // line 41
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page_top"]) ? $context["page_top"] : null), "html", null, true);
        echo "
    ";
        // line 42
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page"]) ? $context["page"] : null), "html", null, true);
        echo "
    ";
        // line 43
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page_bottom"]) ? $context["page_bottom"] : null), "html", null, true);
        echo "
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "themes/omega/omega/templates/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 43,  58 => 42,  54 => 41,  49 => 39,  44 => 37,  39 => 35,  35 => 34,  31 => 33,  27 => 32,  22 => 30,  19 => 29,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for the basic structure of a single Drupal page.*/
/*  **/
/*  * Variables:*/
/*  * - css: A list of CSS files for the current page.*/
/*  * - head: Markup for the HEAD element (including meta tags, keyword tags, and*/
/*  *   so on).*/
/*  * - head_title: A modified version of the page title, for use in the TITLE tag.*/
/*  * - head_title_array: List of text elements that make up the head_title*/
/*  *   variable. May contain or more of the following:*/
/*  *   - title: The title of the page.*/
/*  *   - name: The name of the site.*/
/*  *   - slogan: The slogan of the site.*/
/*  * - page_top: Initial rendered markup. This should be printed before 'page'.*/
/*  * - page: The rendered page markup.*/
/*  * - page_bottom: Closing rendered markup. This variable should be printed after*/
/*  *   'page'.*/
/*  * - styles: Style tags necessary to import all necessary CSS files in the head.*/
/*  * - scripts: Script tags necessary to load the JavaScript files and settings*/
/*  *   in the head.*/
/*  **/
/*  * @see template_preprocess_html()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <!DOCTYPE html>*/
/* <html{{ html_attributes }}>*/
/*   <head>*/
/*     {{ head }}*/
/*     <title>{{ head_title }}</title>*/
/*     {{ styles }}*/
/*     {{ scripts }}*/
/*   </head>*/
/*   <body{{ attributes }}>*/
/*     <a href="#main-content" class="visually-hidden focusable skip-link">*/
/*       {{ 'Skip to main content'|t }}*/
/*     </a>*/
/*     {{ page_top }}*/
/*     {{ page }}*/
/*     {{ page_bottom }}*/
/*   </body>*/
/* </html>*/
/* */
