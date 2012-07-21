<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library/'),
	realpath(APPLICATION_PATH . '/../library/SRCustom'),
	realpath(APPLICATION_PATH . '/../extras/library/'),
	realpath(APPLICATION_PATH . '/../public/libs/'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

//Tratuction
$translate = new Zend_Translate('csv', APPLICATION_PATH .'/language', null, array('scan' => Zend_Translate::LOCALE_FILENAME));
$translate->setLocale('fr_FR');
Zend_Registry::set('Zend_Translate', $translate);

$application->bootstrap()->run();