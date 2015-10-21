<?php

/* core/modules/system/templates/system-themes-page.html.twig */
class __TwigTemplate_86bde0d6a2e22464196b7b8e7dce2596fe338286f23140a2b5a0e81229d954b9 extends Twig_Template
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
        // line 33
        echo "<div";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attributes"]) ? $context["attributes"] : null), "html", null, true);
        echo ">
  ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["theme_groups"]) ? $context["theme_groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["theme_group"]) {
            // line 35
            echo "    ";
            // line 36
            $context["theme_group_classes"] = array(0 => "system-themes-list", 1 => ("system-themes-list-" . $this->getAttribute(            // line 38
$context["theme_group"], "state", array())), 2 => "clearfix");
            // line 42
            echo "    <div";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["theme_group"], "attributes", array()), "addClass", array(0 => (isset($context["theme_group_classes"]) ? $context["theme_group_classes"] : null)), "method"), "html", null, true);
            echo ">
      <h2 class=\"system-themes-list__header\">";
            // line 43
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["theme_group"], "title", array()), "html", null, true);
            echo "</h2>
      ";
            // line 44
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["theme_group"], "themes", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                // line 45
                echo "        ";
                // line 46
                $context["theme_classes"] = array(0 => (($this->getAttribute(                // line 47
$context["theme"], "is_default", array())) ? ("theme-default") : ("")), 1 => (($this->getAttribute(                // line 48
$context["theme"], "is_admin", array())) ? ("theme-admin") : ("")), 2 => "theme-selector", 3 => "clearfix");
                // line 53
                echo "        <div";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["theme"], "attributes", array()), "addClass", array(0 => (isset($context["theme_classes"]) ? $context["theme_classes"] : null)), "method"), "html", null, true);
                echo ">
          ";
                // line 54
                if ($this->getAttribute($context["theme"], "screenshot", array())) {
                    // line 55
                    echo "            ";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["theme"], "screenshot", array()), "html", null, true);
                    echo "
          ";
                }
                // line 57
                echo "          <div class=\"theme-info\">
            <h3 class=\"theme-info__header\">";
                // line 59
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["theme"], "name", array()), "html", null, true);
                echo " ";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["theme"], "version", array()), "html", null, true);
                // line 60
                if ($this->getAttribute($context["theme"], "notes", array())) {
                    // line 61
                    echo "                (";
                    echo $this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('drupal_core')->safeJoin($this->env, $this->getAttribute($context["theme"], "notes", array()), ", "));
                    echo ")";
                }
                // line 63
                echo "</h3>
            <div class=\"theme-info__description\">";
                // line 64
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["theme"], "description", array()), "html", null, true);
                echo "</div>
            ";
                // line 66
                echo "            ";
                if ($this->getAttribute($context["theme"], "incompatible", array())) {
                    // line 67
                    echo "              <div class=\"incompatible\">";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["theme"], "incompatible", array()), "html", null, true);
                    echo "</div>
            ";
                } else {
                    // line 69
                    echo "              ";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["theme"], "operations", array()), "html", null, true);
                    echo "
            ";
                }
                // line 71
                echo "          </div>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/system-themes-page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 76,  109 => 74,  101 => 71,  95 => 69,  89 => 67,  86 => 66,  82 => 64,  79 => 63,  74 => 61,  72 => 60,  68 => 59,  65 => 57,  59 => 55,  57 => 54,  52 => 53,  50 => 48,  49 => 47,  48 => 46,  46 => 45,  42 => 44,  38 => 43,  33 => 42,  31 => 38,  30 => 36,  28 => 35,  24 => 34,  19 => 33,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for the Appearance page.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: HTML attributes for the main container.*/
/*  * - theme_groups: A list of theme groups. Each theme group contains:*/
/*  *   - attributes: HTML attributes specific to this theme group.*/
/*  *   - title: Title for the theme group.*/
/*  *   - state: State of the theme group, e.g. installed or uninstalled.*/
/*  *   - themes: A list of themes within the theme group. Each theme contains:*/
/*  *     - attributes: HTML attributes specific to this theme.*/
/*  *     - screenshot: A screenshot representing the theme.*/
/*  *     - description: Description of the theme.*/
/*  *     - name: Theme name.*/
/*  *     - version: The theme's version number.*/
/*  *     - is_default: Boolean indicating whether the theme is the default theme*/
/*  *       or not.*/
/*  *     - is_admin: Boolean indicating whether the theme is the admin theme or*/
/*  *       not.*/
/*  *     - notes: Identifies what context this theme is being used in, e.g.,*/
/*  *       default theme, admin theme.*/
/*  *     - incompatible: Text describing any compatibility issues.*/
/*  *     - operations: A list of operation links, e.g., Settings, Enable, Disable,*/
/*  *       etc. these links should only be displayed if the theme is compatible.*/
/*  **/
/*  * @see template_preprocess_system_themes_page()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <div{{ attributes }}>*/
/*   {% for theme_group in theme_groups %}*/
/*     {%*/
/*       set theme_group_classes = [*/
/*         'system-themes-list',*/
/*         'system-themes-list-' ~ theme_group.state,*/
/*         'clearfix',*/
/*       ]*/
/*     %}*/
/*     <div{{ theme_group.attributes.addClass(theme_group_classes) }}>*/
/*       <h2 class="system-themes-list__header">{{ theme_group.title }}</h2>*/
/*       {% for theme in theme_group.themes %}*/
/*         {%*/
/*           set theme_classes = [*/
/*             theme.is_default ? 'theme-default',*/
/*             theme.is_admin ? 'theme-admin',*/
/*             'theme-selector',*/
/*             'clearfix',*/
/*           ]*/
/*         %}*/
/*         <div{{ theme.attributes.addClass(theme_classes) }}>*/
/*           {% if theme.screenshot %}*/
/*             {{ theme.screenshot }}*/
/*           {% endif %}*/
/*           <div class="theme-info">*/
/*             <h3 class="theme-info__header">*/
/*               {{- theme.name }} {{ theme.version -}}*/
/*               {% if theme.notes %}*/
/*                 ({{ theme.notes|safe_join(', ') }})*/
/*               {%- endif -%}*/
/*             </h3>*/
/*             <div class="theme-info__description">{{ theme.description }}</div>*/
/*             {# Display operation links if the theme is compatible. #}*/
/*             {% if theme.incompatible %}*/
/*               <div class="incompatible">{{ theme.incompatible }}</div>*/
/*             {% else %}*/
/*               {{ theme.operations }}*/
/*             {% endif %}*/
/*           </div>*/
/*         </div>*/
/*       {% endfor %}*/
/*     </div>*/
/*   {% endfor %}*/
/* </div>*/
/* */
