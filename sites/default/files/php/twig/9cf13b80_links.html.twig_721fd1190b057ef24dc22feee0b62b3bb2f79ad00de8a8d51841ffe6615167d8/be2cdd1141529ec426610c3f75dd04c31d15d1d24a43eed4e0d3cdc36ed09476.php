<?php

/* core/themes/classy/templates/navigation/links.html.twig */
class __TwigTemplate_be49abc1ecf023bdcb7527ca0c23fb1bd7ee4da9798ea32fe77341cdde0f83d4 extends Twig_Template
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
        // line 35
        if ((isset($context["links"]) ? $context["links"] : null)) {
            // line 36
            if ((isset($context["heading"]) ? $context["heading"] : null)) {
                // line 37
                if ($this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "level", array())) {
                    // line 38
                    echo "<";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "level", array()), "html", null, true);
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "attributes", array()), "html", null, true);
                    echo ">";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "text", array()), "html", null, true);
                    echo "</";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "level", array()), "html", null, true);
                    echo ">";
                } else {
                    // line 40
                    echo "<h2";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "attributes", array()), "html", null, true);
                    echo ">";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "text", array()), "html", null, true);
                    echo "</h2>";
                }
            }
            // line 43
            echo "<ul";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attributes"]) ? $context["attributes"] : null), "html", null, true);
            echo ">";
            // line 44
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 45
                echo "<li";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "attributes", array()), "addClass", array(0 => \Drupal\Component\Utility\Html::getClass($context["key"])), "method"), "html", null, true);
                echo ">";
                // line 46
                if ($this->getAttribute($context["item"], "link", array())) {
                    // line 47
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "link", array()), "html", null, true);
                } elseif ($this->getAttribute(                // line 48
$context["item"], "text_attributes", array())) {
                    // line 49
                    echo "<span";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "text_attributes", array()), "html", null, true);
                    echo ">";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "text", array()), "html", null, true);
                    echo "</span>";
                } else {
                    // line 51
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "text", array()), "html", null, true);
                }
                // line 53
                echo "</li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "</ul>";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/navigation/links.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 55,  71 => 53,  68 => 51,  61 => 49,  59 => 48,  57 => 47,  55 => 46,  51 => 45,  47 => 44,  43 => 43,  35 => 40,  25 => 38,  23 => 37,  21 => 36,  19 => 35,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for a set of links.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: Attributes for the UL containing the list of links.*/
/*  * - links: Links to be output.*/
/*  *   Each link will have the following elements:*/
/*  *   - title: The link text.*/
/*  *   - href: The link URL. If omitted, the 'title' is shown as a plain text*/
/*  *     item in the links list. If 'href' is supplied, the entire link is passed*/
/*  *     to l() as its $options parameter.*/
/*  *   - attributes: (optional) HTML attributes for the anchor, or for the <span>*/
/*  *     tag if no 'href' is supplied.*/
/*  *   - link_key: The link CSS class.*/
/*  * - heading: (optional) A heading to precede the links.*/
/*  *   - text: The heading text.*/
/*  *   - level: The heading level (e.g. 'h2', 'h3').*/
/*  *   - attributes: (optional) A keyed list of attributes for the heading.*/
/*  *   If the heading is a string, it will be used as the text of the heading and*/
/*  *   the level will default to 'h2'.*/
/*  **/
/*  *   Headings should be used on navigation menus and any list of links that*/
/*  *   consistently appears on multiple pages. To make the heading invisible use*/
/*  *   the 'visually-hidden' CSS class. Do not use 'display:none', which*/
/*  *   removes it from screen readers and assistive technology. Headings allow*/
/*  *   screen reader and keyboard only users to navigate to or skip the links.*/
/*  *   See http://juicystudio.com/article/screen-readers-display-none.php and*/
/*  *   http://www.w3.org/TR/WCAG-TECHS/H42.html for more information.*/
/*  **/
/*  * @see template_preprocess_links()*/
/*  *//* */
/* #}*/
/* {% if links -%}*/
/*   {%- if heading -%}*/
/*     {%- if heading.level -%}*/
/*       <{{ heading.level }}{{ heading.attributes }}>{{ heading.text }}</{{ heading.level }}>*/
/*     {%- else -%}*/
/*       <h2{{ heading.attributes }}>{{ heading.text }}</h2>*/
/*     {%- endif -%}*/
/*   {%- endif -%}*/
/*   <ul{{ attributes }}>*/
/*     {%- for key, item in links -%}*/
/*       <li{{ item.attributes.addClass(key|clean_class) }}>*/
/*         {%- if item.link -%}*/
/*           {{ item.link }}*/
/*         {%- elseif item.text_attributes -%}*/
/*           <span{{ item.text_attributes }}>{{ item.text }}</span>*/
/*         {%- else -%}*/
/*           {{ item.text }}*/
/*         {%- endif -%}*/
/*       </li>*/
/*     {%- endfor -%}*/
/*   </ul>*/
/* {%- endif %}*/
/* */
