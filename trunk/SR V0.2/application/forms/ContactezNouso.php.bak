<?php
//http://devzone.zend.com/1240/decorators-with-zend_form/
//http://www.tig12.net/downloads/apidocs/zf/index.html
class Application_Form_ContactezNous extends Zend_Form
{
	/*public function init()
    {
        $mail = new Zend_Form_Element_Text('mail');
		$mail->setLabel('Adresse Mail')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty', new Zend_Validate_EmailAddress);
				//->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')
				//->setDecorators(array('SRInput'));
		
		$nom = new Zend_Form_Element_Text('nom');
		$nom->setLabel('Identité')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty')
				->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')				
				->setDecorators(array('SRInput'));
		
		/*$equipe = new Zend_Form_Element_Text('equipe');
		$equipe->setLabel('Equipe')
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')
				->setDecorators(array('SRInput'));*/
		
		/*$sujet = new Zend_Form_Element_Text('sujet');
		$sujet->setLabel('Sujet')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty')
				->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')
				->setDecorators(array('SRInput'));*/
		
		
		/*$message = new Zend_Form_Element_Textarea('message');
		$message->setLabel('Message')
				->setAttrib('cols', '35')
				->setAttrib('rows', '10')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty')
				->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator')
				->setDecorators(array('SRInput'));*/

		/*$captcha = new Zend_Form_Element_Captcha('captcha', 
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
								/*"height" => 50,								
								"fontSize" => 25,* /
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
				->setDecorators(array('SRCaptcha'));*/
				
		
		/*$envoyer = new Zend_Form_Element_Submit('envoyer');
		$envoyer->setAttrib('id', 'boutonenvoyer');* /
				//->setDecorators($this->buttonDecorators);
				//->setDecorators($this->loadDefaultDecorators());
		
		
		$this->addElements(array($mail, $nom, $equipe, $sujet, $message, $captcha, $envoyer));		
    }*/
	

    public function loadDefaultDecorators()
    {
        return array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table', 'class' => 'formTable')),
            'Form',
        );
    }

	
	/*public function init()
    {
        $this->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator');
		//$this->clearDecorators();
		
		$this->setMethod('post')->setAttrib('id', 'formContactezNous');
		$this->setName('Contactez-nous');
		
		$mail = new Zend_Form_Element_Text('mail');
		$mail->setLabel('Adresse Mail')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty', new Zend_Validate_EmailAddress());
				
		
		$nom = new Zend_Form_Element_Text('nom');
		$nom->setLabel('Identité')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
				
		$equipe = new Zend_Form_Element_Text('equipe');
		$equipe->setLabel('Equipe')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
		
		$sujet = new Zend_Form_Element_Text('sujet');
		$sujet->setLabel('Sujet')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
				
								
		$captcha = new Zend_Form_Element_Captcha('captcha', 
						array
						(
							'label' => "Merci de confirmer que vous êtes humain",
							// paramétrage en reprenant les noms de méthodes vus précédemment
							'captcha' => array
							(
								"captcha" => "Image",
								"wordLen" => 4,
								"font" => "libs/comic.ttf",
								/*"height" => 50,								
								"fontSize" => 25,* /
								"width" => 100,
								"imgDir" => "libs/",
								"imgUrl" => "libs/",
								"DotNoiseLevel" => 20,
								"LineNoiseLevel" => 2
							)
						)
					);
		
		$message = new Zend_Form_Element_Textarea('message');
		$message->setLabel('Message')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
		
		$envoyer = new Zend_Form_Element_Submit('envoyer');
		$envoyer->setAttrib('id', 'boutonenvoyer');
		
		$this->addElements(array($mail, $nom, $equipe, $sujet, $message, $captcha, $envoyer));
		
		$this->setElementDecorators(array(
			'ViewHelper',
			'Errors',
			array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
			array('Label', array('tag' => 'td'),
			array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
		)));
		
		/*$this->setDecorators(array(
            array('ViewScript', array('viewScript' => 'contactez-nous/contactez-nous.phtml'))
        ));*/
		
		/*$this->setDecorators(array('FormElements',
									array('HtmlTag', array('tag' => 'div', 'class' => 'form')),
									'SRInput',
									'Form'));*/
		/*$this->setDecorators(array(
			'ViewHelper',
			'Description',
			'Errors',
			array(array('elementDiv' => 'HtmlTag'), array('tag' => 'div')),
			array(array('td' => 'HtmlTag'), array('tag' => 'td')),
			array('Label', array('tag' => 'td')),
		));*/
		
		/*
		setDecorators(array(array('ViewScript', array(
    'viewScript' => '_element.phtml',
    'class'      => 'form element'
		* /
    }*/
	
	

}

