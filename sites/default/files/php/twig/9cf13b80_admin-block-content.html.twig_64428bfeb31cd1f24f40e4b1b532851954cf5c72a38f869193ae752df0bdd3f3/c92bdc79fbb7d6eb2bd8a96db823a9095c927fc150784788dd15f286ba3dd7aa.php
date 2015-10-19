<?php

/* core/themes/seven/templates/admin-block-content.html.twig */
class __TwigTemplate_99bcffbb984e58d1871882c454f8c5bec5f82657e106a97b94c9f82ca6faaa65 extends Twig_Template
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
        // line 21
        $context["classes"] = array(0 => "admin-list", 1 => ((        // line 23
(isset($context["compact"]) ? $context["compact"] : null)) ? ("compact") : ("")));
        // line 26
        if ((isset($context["content"]) ? $context["content"] : null)) {
            // line 27
            echo "  <ul";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true);
            echo ">
    ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["content"]) ? $context["content"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 29
                echo "      <li><a href=\"";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true);
                echo "\"><span class=\"label\">";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "</span><div class=\"description\">";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
                echo "</div></a></li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "  </ul>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/seven/templates/admin-block-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 31,  33 => 29,  29 => 28,  24 => 27,  22 => 26,  20 => 23,  19 => 21,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Seven's theme implementation for the content of an administrative block.*/
/*  **/
/*  * Uses unordered list markup in both compact and extended modes.*/
/*  **/
/*  * Available variables:*/
/*  * - content: List of administrative menu items. Each menu item contains:*/
/*  *   - url: Path to the admin section.*/
/*  *   - title: Short name of the section.*/
/*  *   - description: Description of the administrative menu item.*/
/*  * - attributes: HTML attributes to be added to the element.*/
/*  * - compact: Boolean indicating whether compact mode is turned on or not.*/
/*  **/
/*  * @see template_preprocess_admin_block_content()*/
/*  * @see seven_preprocess_admin_block_content()*/
/*  *//* */
/* #}*/
/* {%*/
/*   set classes = [*/
/*     'admin-list',*/
/*     compact ? 'compact',*/
/*   ]*/
/* %}*/
/* {% if content %}*/
/*   <ul{{ attributes.addClass(classes) }}>*/
/*     {% for item in content %}*/
/*       <li><a href="{{ item.url }}"><span class="label">{{ item.title }}</span><div class="description">{{ item.description }}</div></a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/* {% endif %}*/
/* */
