<?php

/* core/themes/classy/templates/navigation/toolbar.html.twig */
class __TwigTemplate_5d75925e531c5f7f52225f3b9e14eaff10723ca7eaffe337e69330e5182e8580 extends Twig_Template
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
        // line 23
        echo "<div";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => "toolbar"), "method"), "html", null, true);
        echo ">
  <nav";
        // line 24
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["toolbar_attributes"]) ? $context["toolbar_attributes"] : null), "addClass", array(0 => "toolbar-bar", 1 => "clearfix"), "method"), "html", null, true);
        echo ">
    <h2 class=\"visually-hidden\">";
        // line 25
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["toolbar_heading"]) ? $context["toolbar_heading"] : null), "html", null, true);
        echo "</h2>
    ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tabs"]) ? $context["tabs"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
            // line 27
            echo "      ";
            $context["tray"] = $this->getAttribute((isset($context["trays"]) ? $context["trays"] : null), $context["key"], array(), "array");
            // line 28
            echo "      <div";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["tab"], "attributes", array()), "addClass", array(0 => "toolbar-tab"), "method"), "html", null, true);
            echo ">
        ";
            // line 29
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["tab"], "link", array()), "html", null, true);
            echo "
        ";
            // line 30
            ob_start();
            // line 31
            echo "          <div";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["tray"]) ? $context["tray"] : null), "attributes", array()), "html", null, true);
            echo ">
            ";
            // line 32
            if ($this->getAttribute((isset($context["tray"]) ? $context["tray"] : null), "label", array())) {
                // line 33
                echo "              <nav class=\"toolbar-lining clearfix\" role=\"navigation\" aria-label=\"";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["tray"]) ? $context["tray"] : null), "label", array()), "html", null, true);
                echo "\">
                <h3 class=\"toolbar-tray-name visually-hidden\">";
                // line 34
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["tray"]) ? $context["tray"] : null), "label", array()), "html", null, true);
                echo "</h3>
            ";
            } else {
                // line 36
                echo "              <nav class=\"toolbar-lining clearfix\" role=\"navigation\">
            ";
            }
            // line 38
            echo "            ";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["tray"]) ? $context["tray"] : null), "links", array()), "html", null, true);
            echo "
            </nav>
          </div>
        ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 42
            echo "      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "  </nav>
  ";
        // line 45
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["remainder"]) ? $context["remainder"] : null), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/navigation/toolbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 45,  86 => 44,  79 => 42,  71 => 38,  67 => 36,  62 => 34,  57 => 33,  55 => 32,  50 => 31,  48 => 30,  44 => 29,  39 => 28,  36 => 27,  32 => 26,  28 => 25,  24 => 24,  19 => 23,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for the administrative toolbar.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: HTML attributes for the wrapper.*/
/*  * - toolbar_attributes: HTML attributes to apply to the toolbar.*/
/*  * - toolbar_heading: The heading or label for the toolbar.*/
/*  * - tabs: List of tabs for the toolbar.*/
/*  *   - attributes: HTML attributes for the tab container.*/
/*  *   - link: Link or button for the menu tab.*/
/*  * - trays: Toolbar tray list, each associated with a tab. Each tray in trays*/
/*  *   contains:*/
/*  *   - attributes: HTML attributes to apply to the tray.*/
/*  *   - label: The tray's label.*/
/*  *   - links: The tray menu links.*/
/*  * - remainder: Any non-tray, non-tab elements left to be rendered.*/
/*  **/
/*  * @see template_preprocess_toolbar()*/
/*  *//* */
/* #}*/
/* <div{{ attributes.addClass('toolbar') }}>*/
/*   <nav{{ toolbar_attributes.addClass('toolbar-bar', 'clearfix') }}>*/
/*     <h2 class="visually-hidden">{{ toolbar_heading }}</h2>*/
/*     {% for key, tab in tabs %}*/
/*       {% set tray = trays[key] %}*/
/*       <div{{ tab.attributes.addClass('toolbar-tab') }}>*/
/*         {{ tab.link }}*/
/*         {% spaceless %}*/
/*           <div{{ tray.attributes }}>*/
/*             {% if tray.label %}*/
/*               <nav class="toolbar-lining clearfix" role="navigation" aria-label="{{ tray.label }}">*/
/*                 <h3 class="toolbar-tray-name visually-hidden">{{ tray.label }}</h3>*/
/*             {% else %}*/
/*               <nav class="toolbar-lining clearfix" role="navigation">*/
/*             {% endif %}*/
/*             {{ tray.links }}*/
/*             </nav>*/
/*           </div>*/
/*         {% endspaceless %}*/
/*       </div>*/
/*     {% endfor %}*/
/*   </nav>*/
/*   {{ remainder }}*/
/* </div>*/
/* */
