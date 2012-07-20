<?php
//http://devzone.zend.com/1240/decorators-with-zend_form/
//http://www.tig12.net/downloads/apidocs/zf/index.html
class Application_Form_ContactezNous extends Zend_Form
{
	public $buttonDecorators = array(
        'ViewHelper',
        array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
        array(array('label' => 'HtmlTag'), array('tag' => 'td', 'placement' => 'prepend')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
    );
	
	public function init()
    {
        $this->setMethod('post');
		
		$mail = new Zend_Form_Element_Text('mail');
		$mail->setLabel('Adresse Mail')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator(new Zend_Validate_EmailAddress())
				->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')
				->setDecorators(array('SRInput'));
		
		$nom = new Zend_Form_Element_Text('nom');
		$nom->setLabel('Identité')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')
				->setOptions(array('class' =>'classNom'))
				->setDecorators(array('SRInput'));
		
		$equipe = new Zend_Form_Element_Text('equipe');
		$equipe->setLabel('Equipe')
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')
				->setDecorators(array('SRInput'));
		
		$sujet = new Zend_Form_Element_Text('sujet');
		$sujet->setLabel('Sujet')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')
				->setDecorators(array('SRInput'));
		
		
		$message = new Zend_Form_Element_Textarea('message');
		$message->setLabel('Message')
				->setAttrib('cols', '35')
				->setAttrib('rows', '10')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')
				->setDecorators(array('SRInput'));
		
		$captcha = new Zend_Form_Element_Captcha('captcha', 
						array
						(
							'label' => "Captcha",
							'description' => "Merci de recopier le code ci-contre.",							
							// paramétrage en reprenant les noms de méthodes vus précédemment
							'captcha' => array
							(
								"captcha" => "Image",
								"wordLen" => 4,
								"font" => "libs/comic.ttf",
								/*"height" => 50,	*/							
								"fontSize" => 14,
								"width" => 100,
								"imgDir" => "libs/",
								"imgUrl" => "libs/",
								"DotNoiseLevel" => 20,
								"LineNoiseLevel" => 2
							)
						)
					);
					
		$captcha->setRequired(true)
				->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')
				->setDecorators(array('SRCaptcha'));
				
		
		$envoyer = new Zend_Form_Element_Submit('envoyer');
		$envoyer->setAttrib('id', 'boutonenvoyer')
			->setDecorators($this->buttonDecorators);
		
		$this->addElements(array($mail, $nom, $equipe, $sujet, $message, $captcha, $envoyer));		
    }

    public function loadDefaultDecorators()
    {
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table', 'class' => 't4ftable')),
            'Form',
        ));
    }

}

