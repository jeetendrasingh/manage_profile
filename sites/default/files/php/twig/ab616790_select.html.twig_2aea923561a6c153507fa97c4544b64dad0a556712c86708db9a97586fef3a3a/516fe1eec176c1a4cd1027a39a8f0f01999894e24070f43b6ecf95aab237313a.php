<?php

/* core/themes/classy/templates/form/select.html.twig */
class __TwigTemplate_c0a784abb6dabc59f5c984cc3d6166834fb2204efc0df956e2df1ba9155ac04c extends Twig_Template
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
        // line 13
        ob_start();
        // line 14
        echo "  <select";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attributes"]) ? $context["attributes"] : null), "html", null, true);
        echo ">
    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 16
            echo "      ";
            if (($this->getAttribute($context["option"], "type", array()) == "optgroup")) {
                // line 17
                echo "        <optgroup label=\"";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["option"], "label", array()), "html", null, true);
                echo "\">
          ";
                // line 18
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["option"], "options", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sub_option"]) {
                    // line 19
                    echo "            <option value=\"";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["sub_option"], "value", array()), "html", null, true);
                    echo "\"";
                    echo $this->env->getExtension('drupal_core')->renderVar((($this->getAttribute($context["sub_option"], "selected", array())) ? (" selected=\"selected\"") : ("")));
                    echo ">";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["sub_option"], "label", array()), "html", null, true);
                    echo "</option>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 21
                echo "        </optgroup>
      ";
            } elseif (($this->getAttribute(            // line 22
$context["option"], "type", array()) == "option")) {
                // line 23
                echo "        <option value=\"";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["option"], "value", array()), "html", null, true);
                echo "\"";
                echo $this->env->getExtension('drupal_core')->renderVar((($this->getAttribute($context["option"], "selected", array())) ? (" selected=\"selected\"") : ("")));
                echo ">";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["option"], "label", array()), "html", null, true);
                echo "</option>
      ";
            }
            // line 25
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "  </select>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/form/select.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 26,  70 => 25,  60 => 23,  58 => 22,  55 => 21,  42 => 19,  38 => 18,  33 => 17,  30 => 16,  26 => 15,  21 => 14,  19 => 13,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for a select element.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: HTML attributes for the select tag.*/
/*  * - options: The option element children.*/
/*  **/
/*  * @see template_preprocess_select()*/
/*  *//* */
/* #}*/
/* {% spaceless %}*/
/*   <select{{ attributes }}>*/
/*     {% for option in options %}*/
/*       {% if option.type == 'optgroup' %}*/
/*         <optgroup label="{{ option.label }}">*/
/*           {% for sub_option in option.options %}*/
/*             <option value="{{ sub_option.value }}"{{ sub_option.selected ? ' selected="selected"' }}>{{ sub_option.label }}</option>*/
/*           {% endfor %}*/
/*         </optgroup>*/
/*       {% elseif option.type == 'option' %}*/
/*         <option value="{{ option.value }}"{{ option.selected ? ' selected="selected"' }}>{{ option.label }}</option>*/
/*       {% endif %}*/
/*     {% endfor %}*/
/*   </select>*/
/* {% endspaceless %}*/
/* */
