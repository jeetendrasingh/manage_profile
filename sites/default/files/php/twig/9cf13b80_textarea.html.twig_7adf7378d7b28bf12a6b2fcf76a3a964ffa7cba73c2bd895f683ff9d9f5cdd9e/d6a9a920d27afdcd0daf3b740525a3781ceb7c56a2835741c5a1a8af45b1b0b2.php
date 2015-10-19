<?php

/* core/themes/classy/templates/form/textarea.html.twig */
class __TwigTemplate_5596572edf557b669d7c018601854df203e01d6e13b82490d00f240a5aa7bce4 extends Twig_Template
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
        // line 17
        $context["classes"] = array(0 => "form-textarea", 1 => ((        // line 19
(isset($context["resizable"]) ? $context["resizable"] : null)) ? (("resize-" . (isset($context["resizable"]) ? $context["resizable"] : null))) : ("")), 2 => ((        // line 20
(isset($context["required"]) ? $context["required"] : null)) ? ("required") : ("")));
        // line 23
        echo "<div";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["wrapper_attributes"]) ? $context["wrapper_attributes"] : null), "addClass", array(0 => "form-textarea-wrapper"), "method"), "html", null, true);
        echo ">
  <textarea";
        // line 24
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true);
        echo ">";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
        echo "</textarea>
</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/form/textarea.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 24,  23 => 23,  21 => 20,  20 => 19,  19 => 17,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for a 'textarea' #type form element.*/
/*  **/
/*  * Available variables*/
/*  * - wrapper_attributes: A list of HTML attributes for the wrapper element.*/
/*  * - attributes: A list of HTML attributes for the textarea element.*/
/*  * - resizable: An indicator for whether the textarea is resizable.*/
/*  * - required: An indicator for whether the textarea is required.*/
/*  * - value: The textarea content.*/
/*  **/
/*  * @see template_preprocess_textarea()*/
/*  *//* */
/* #}*/
/* {%*/
/*   set classes = [*/
/*     'form-textarea',*/
/*     resizable ? 'resize-' ~ resizable,*/
/*     required ? 'required',*/
/*   ]*/
/* %}*/
/* <div{{ wrapper_attributes.addClass('form-textarea-wrapper') }}>*/
/*   <textarea{{ attributes.addClass(classes) }}>{{ value }}</textarea>*/
/* </div>*/
/* */
