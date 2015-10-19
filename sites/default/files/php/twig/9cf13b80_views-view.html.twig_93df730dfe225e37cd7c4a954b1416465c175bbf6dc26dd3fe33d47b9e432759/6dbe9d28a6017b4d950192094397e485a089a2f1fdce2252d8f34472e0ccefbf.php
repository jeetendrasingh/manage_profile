<?php

/* core/modules/views/templates/views-view.html.twig */
class __TwigTemplate_20a102c9e191248a497d417cd0bb8302c7875ee6e8c7bb28115aa04cd1b285ac extends Twig_Template
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
        // line 36
        $context["classes"] = array(0 => ((        // line 37
(isset($context["dom_id"]) ? $context["dom_id"] : null)) ? (("js-view-dom-id-" . (isset($context["dom_id"]) ? $context["dom_id"] : null))) : ("")));
        // line 40
        echo "<div";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true);
        echo ">
  ";
        // line 41
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true);
        echo "
  ";
        // line 42
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "
  ";
        // line 43
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true);
        echo "

  ";
        // line 45
        if ((isset($context["header"]) ? $context["header"] : null)) {
            // line 46
            echo "    <header>
      ";
            // line 47
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["header"]) ? $context["header"] : null), "html", null, true);
            echo "
    </header>
  ";
        }
        // line 50
        echo "
  ";
        // line 51
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["exposed"]) ? $context["exposed"] : null), "html", null, true);
        echo "
  ";
        // line 52
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attachment_before"]) ? $context["attachment_before"] : null), "html", null, true);
        echo "

  ";
        // line 54
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["rows"]) ? $context["rows"] : null), "html", null, true);
        echo "
  ";
        // line 55
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["empty"]) ? $context["empty"] : null), "html", null, true);
        echo "
  ";
        // line 56
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["pager"]) ? $context["pager"] : null), "html", null, true);
        echo "

  ";
        // line 58
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attachment_after"]) ? $context["attachment_after"] : null), "html", null, true);
        echo "
  ";
        // line 59
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["more"]) ? $context["more"] : null), "html", null, true);
        echo "

  ";
        // line 61
        if ((isset($context["footer"]) ? $context["footer"] : null)) {
            // line 62
            echo "    <footer>
      ";
            // line 63
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["footer"]) ? $context["footer"] : null), "html", null, true);
            echo "
    </footer>
  ";
        }
        // line 66
        echo "
  ";
        // line 67
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["feed_icons"]) ? $context["feed_icons"] : null), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/views/templates/views-view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 67,  96 => 66,  90 => 63,  87 => 62,  85 => 61,  80 => 59,  76 => 58,  71 => 56,  67 => 55,  63 => 54,  58 => 52,  54 => 51,  51 => 50,  45 => 47,  42 => 46,  40 => 45,  35 => 43,  31 => 42,  27 => 41,  22 => 40,  20 => 37,  19 => 36,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for main view template.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: Remaining HTML attributes for the element.*/
/*  * - css_name: A css-safe version of the view name.*/
/*  * - css_class: The user-specified classes names, if any.*/
/*  * - header: The optional header.*/
/*  * - footer: The optional footer.*/
/*  * - rows: The results of the view query, if any.*/
/*  * - empty: The content to display if there are no rows.*/
/*  * - pager: The optional pager next/prev links to display.*/
/*  * - exposed: Exposed widget form/info to display.*/
/*  * - feed_icons: Optional feed icons to display.*/
/*  * - more: An optional link to the next page of results.*/
/*  * - title: Title of the view, only used when displaying in the admin preview.*/
/*  * - title_prefix: Additional output populated by modules, intended to be*/
/*  *   displayed in front of the view title.*/
/*  * - title_suffix: Additional output populated by modules, intended to be*/
/*  *   displayed after the view title.*/
/*  * - attachment_before: An optional attachment view to be displayed before the*/
/*  *   view content.*/
/*  * - attachment_after: An optional attachment view to be displayed after the*/
/*  *   view content.*/
/*  * - dom_id: Unique id for every view being printed to give unique class for*/
/*  *   Javascript.*/
/*  **/
/*  * @see template_preprocess_views_view()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* {%*/
/*   set classes = [*/
/*     dom_id ? 'js-view-dom-id-' ~ dom_id,*/
/*   ]*/
/* %}*/
/* <div{{ attributes.addClass(classes) }}>*/
/*   {{ title_prefix }}*/
/*   {{ title }}*/
/*   {{ title_suffix }}*/
/* */
/*   {% if header %}*/
/*     <header>*/
/*       {{ header }}*/
/*     </header>*/
/*   {% endif %}*/
/* */
/*   {{ exposed }}*/
/*   {{ attachment_before }}*/
/* */
/*   {{ rows }}*/
/*   {{ empty }}*/
/*   {{ pager }}*/
/* */
/*   {{ attachment_after }}*/
/*   {{ more }}*/
/* */
/*   {% if footer %}*/
/*     <footer>*/
/*       {{ footer }}*/
/*     </footer>*/
/*   {% endif %}*/
/* */
/*   {{ feed_icons }}*/
/* </div>*/
/* */
