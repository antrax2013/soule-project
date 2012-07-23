<?php
/**
* Fichier de mise en forme d'un champ input avec sortie dans un tr de 3 column
* @author Cyril Cophignon
*/

class SRCustom_Form_Decorator_SRCaptcha extends Zend_Form_Decorator_Captcha 
{
	 	
	public function buildLabel()
    {
        $element = $this->getElement();
        $label = '*'.$element->getLabel();
		$chaine='';
		
        /*if ($translator = $element->getTranslator()) $label = $translator->translate($label);*/
        
		//Si l'�l�ment poss�de l'attribut requiered, on ajoute la mise en forme
		if ($element->isRequired()) 
		{
			$chaine = "<span class='required'>*</span>&nbsp;";
			/*$element->setOptions(array('class' =>'obligatoire'));*/
		}
		
		$chaine = preg_replace("/[*]/",$chaine, $element->getView()->formLabel($element->getName(), $label));
		
		return $chaine;
    }

    public function buildInput()
    {
        $element = $this->getElement();
        $helper  = $element->helper;
		
		$element->setOptions(array('class' =>'ui-widget'));
        return $element->getView()->$helper(
            $element->getName(),
            $element->getValue(),
            $element->getAttribs(),
            $element->options
        );
    }

    public function buildErrors()
    {
        $element  = $this->getElement();
        $messages = $element->getMessages();
        
		if (empty($messages)) return '';
		
        return '<span class="errors">'.$element->getView()->formErrors($messages).'</span>';
    }

    public function buildDescription()
    {
        $element = $this->getElement();
        $desc    = $element->getDescription();
        if (empty($desc)) return '';
		
        return '<span class="description">'.$desc.'</span>';
    }

    public function render($content)
    {
        $element = $this->getElement();
        if (!$element instanceof Zend_Form_Element) return $content;
        
        if (null === $element->getView()) return $content;
		
		$name = $element->getFullyQualifiedName();
		
		$view = $element->getView();
		$hiddenName = $name . '[id]';
        $textName = $name;

        $separator = $this->getSeparator();
        $placement = $this->getPlacement();
        $label     = $this->buildLabel();        
        $errors    = $this->buildErrors();
        $desc      = $this->buildDescription();
		
		$hidden = $view->formHidden($hiddenName, $element->getValue(), $element->getAttribs());
        $input	= $view->formText($textName, '', $element->getAttribs());
		
		$captcha = $element->getCaptcha();
		$markup = $captcha->render($view, $element);
		
		$output = "<tr  class='SRFormTable'><td class='SRFormTable'>$label<br /><span class='captcha-img'>$markup</span> $hidden</td><td class='SRFormTable'>";
		if(!empty($desc)) $output .="$desc<br />";
		$output .= "$input</td><td class='SRFormTable'>$errors</td></tr>";
		

        switch ($placement) {
            case (self::PREPEND):
                return $output . $separator;
            case (self::APPEND):
            default:
                return $separator . $output;
        }
    }
}
?>