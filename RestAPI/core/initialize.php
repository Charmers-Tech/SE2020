<?php 

	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
	defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'xampp' . DS . 'htdocs'. DS .'SE2020' . DS . 'RestAPI');

	//xampp/htdocs/SE2020/RestAPI/includes
	defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
	//xampp/htdocs/SE2020/RestAPI/core
	defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

	//load config file first
	require_once(INC_PATH.DS.'config.php');

	//load core classes
	require_once(CORE_PATH.DS.'product.php');



 ?>