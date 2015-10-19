<?php

/* core/modules/toolbar/templates/toolbar.html.twig */
class __TwigTemplate_aa6c152dc789f860fc0e86e35fb1cd873f594e28cf5c92f6efa877ac2a5a9db8 extends Twig_Template
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
        // line 25
        echo "<div";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => "toolbar"), "method"), "html", null, true);
        echo ">
  <nav";
        // line 26
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["toolbar_attributes"]) ? $context["toolbar_attributes"] : null), "addClass", array(0 => "toolbar-bar"), "method"), "html", null, true);
        echo ">
    <h2 class=\"visually-hidden\">";
        // line 27
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["toolbar_heading"]) ? $context["toolbar_heading"] : null), "html", null, true);
        echo "</h2>
    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tabs"]) ? $context["tabs"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
            // line 29
            echo "      ";
            $context["tray"] = $this->getAttribute((isset($context["trays"]) ? $context["trays"] : null), $context["key"], array(), "array");
            // line 30
            echo "      <div";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["tab"], "attributes", array()), "addClass", array(0 => "toolbar-tab"), "method"), "html", null, true);
            echo ">
        ";
            // line 31
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["tab"], "link", array()), "html", null, true);
            echo "
        ";
            // line 32
            ob_start();
            // line 33
            echo "          <div";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["tray"]) ? $context["tray"] : null), "attributes", array()), "html", null, true);
            echo ">
            ";
            // line 34
            if ($this->getAttribute((isset($context["tray"]) ? $context["tray"] : null), "label", array())) {
                // line 35
                echo "              <nav class=\"toolbar-lining clearfix\" role=\"navigation\" aria-label=\"";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["tray"]) ? $context["tray"] : null), "label", array()), "html", null, true);
                echo "\">
                <h3 class=\"toolbar-tray-name visually-hidden\">";
                // line 36
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["tray"]) ? $context["tray"] : null), "label", array()), "html", null, true);
                echo "</h3>
            ";
            } else {
                // line 38
                echo "              <nav class=\"toolbar-lining clearfix\" role=\"navigation\">
            ";
            }
            // line 40
            echo "            ";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["tray"]) ? $context["tray"] : null), "links", array()), "html", null, true);
            echo "
            </nav>
          </div>
        ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 44
            echo "      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "  </nav>
  ";
        // line 47
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["remainder"]) ? $context["remainder"] : null), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/toolbar/templates/toolbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 47,  86 => 46,  79 => 44,  71 => 40,  67 => 38,  62 => 36,  57 => 35,  55 => 34,  50 => 33,  48 => 32,  44 => 31,  39 => 30,  36 => 29,  32 => 28,  28 => 27,  24 => 26,  19 => 25,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for the administrative toolbar.*/
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
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <div{{ attributes.addClass('toolbar') }}>*/
/*   <nav{{ toolbar_attributes.addClass('toolbar-bar') }}>*/
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
