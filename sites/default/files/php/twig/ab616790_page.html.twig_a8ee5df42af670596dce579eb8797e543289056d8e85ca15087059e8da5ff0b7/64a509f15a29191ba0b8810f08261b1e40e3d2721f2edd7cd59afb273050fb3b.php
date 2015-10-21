<?php

/* core/themes/seven/templates/page.html.twig */
class __TwigTemplate_f0e94dd290f038a147bcc03759f63f7693a254d9de330f5df3cb7fc763f35b7d extends Twig_Template
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
        // line 48
        echo "  <header class=\"content-header clearfix\">
    <div class=\"layout-container\">
      ";
        // line 50
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "html", null, true);
        echo "
    </div>
  </header>

  <div class=\"layout-container\">
    ";
        // line 55
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "pre_content", array()), "html", null, true);
        echo "
    ";
        // line 56
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "breadcrumb", array()), "html", null, true);
        echo "
    <main class=\"page-content clearfix\" role=\"main\">
      <div class=\"visually-hidden\"><a id=\"main-content\" tabindex=\"-1\"></a></div>
      ";
        // line 59
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array()), "html", null, true);
        echo "
      ";
        // line 60
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array())) {
            // line 61
            echo "        <div class=\"help\">
          ";
            // line 62
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array()), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 65
        echo "      ";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true);
        echo "
    </main>

  </div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/seven/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 65,  50 => 62,  47 => 61,  45 => 60,  41 => 59,  35 => 56,  31 => 55,  23 => 50,  19 => 48,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Seven's theme implementation to display a single Drupal page.*/
/*  **/
/*  * The doctype, html, head, and body tags are not in this template. Instead*/
/*  * they can be found in the html.html.twig template normally located in the*/
/*  * core/modules/system directory.*/
/*  **/
/*  * Available variables:*/
/*  **/
/*  * General utility variables:*/
/*  * - base_path: The base URL path of the Drupal installation. Will usually be*/
/*  *   "/" unless you have installed Drupal in a sub-directory.*/
/*  * - is_front: A flag indicating if the current page is the front page.*/
/*  * - logged_in: A flag indicating if the user is registered and signed in.*/
/*  * - is_admin: A flag indicating if the user has permission to access*/
/*  *   administration pages.*/
/*  **/
/*  * Site identity:*/
/*  * - front_page: The URL of the front page. Use this instead of base_path when*/
/*  *   linking to the front page. This includes the language domain or prefix.*/
/*  * - logo: The url of the logo image, as defined in theme settings.*/
/*  * - site_name: The name of the site. This is empty when displaying the site*/
/*  *   name has been disabled in the theme settings.*/
/*  * - site_slogan: The slogan of the site. This is empty when displaying the site*/
/*  *   slogan has been disabled in theme settings.*/
/*  **/
/*  * Page content (in order of occurrence in the default page.html.twig):*/
/*  * - node: Fully loaded node, if there is an automatically-loaded node*/
/*  *   associated with the page and the node ID is the second argument in the*/
/*  *   page's path (e.g. node/12345 and node/12345/revisions, but not*/
/*  *   comment/reply/12345).*/
/*  **/
/*  * Regions:*/
/*  * - page.header: Items for the header region.*/
/*  * - page.pre_content: Items for the pre-content region.*/
/*  * - page.breadcrumb: Items for the breadcrumb region.*/
/*  * - page.highlighted: Items for the highlighted region.*/
/*  * - page.help: Dynamic help text, mostly for admin pages.*/
/*  * - page.content: The main content of the current page.*/
/*  **/
/*  * @see template_preprocess_page()*/
/*  * @see seven_preprocess_page()*/
/*  * @see html.html.twig*/
/*  *//* */
/* #}*/
/*   <header class="content-header clearfix">*/
/*     <div class="layout-container">*/
/*       {{ page.header }}*/
/*     </div>*/
/*   </header>*/
/* */
/*   <div class="layout-container">*/
/*     {{ page.pre_content }}*/
/*     {{ page.breadcrumb }}*/
/*     <main class="page-content clearfix" role="main">*/
/*       <div class="visually-hidden"><a id="main-content" tabindex="-1"></a></div>*/
/*       {{ page.highlighted }}*/
/*       {% if page.help %}*/
/*         <div class="help">*/
/*           {{ page.help }}*/
/*         </div>*/
/*       {% endif %}*/
/*       {{ page.content }}*/
/*     </main>*/
/* */
/*   </div>*/
/* */
