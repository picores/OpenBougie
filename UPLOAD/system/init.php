<?php
/*
 *   Bougie Cloud Micro Blog 安装入口
 *   ========================================
 *   By BOI Station
 *   © 2010 - 2015 All Rights Reserved
 *   http://www.boi.org.cn
 *   ========================================
 *   Support: WebMaster@boi.org.cn
 */

define('IN_BOPBG', TRUE);
define('ENVIRONMENT_PHP_VERSION', '5.3');
//define('SYSTEM_LANG', 'en_US');

if (version_compare(PHP_VERSION, ENVIRONMENT_PHP_VERSION, '<'))
{
	die('Error: OpenBougie require PHP version ' . ENVIRONMENT_PHP_VERSION . ' or newer');
}

if (version_compare(PHP_VERSION, '6.0', '>='))
{
	die('Error: OpenBougie not support PHP version 6 currently');
}

define('START_TIME', microtime(TRUE));

if (function_exists('memory_get_usage'))
{
	define('MEMORY_USAGE_START', memory_get_usage());
}

error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

if (! defined('BOG_PATH'))
{
	define('BOG_PATH', dirname(__FILE__) . '/');
}

if (defined('SAE_TMP_PATH'))
{
	define('IN_SAE', true);
}

define('ROOT_PATH', dirname(dirname(__FILE__)) . '/');

if (defined('IN_SAE'))
{
	define('TEMP_PATH', SAE_TMP_PATH);
}
else
{
	define('TEMP_PATH', dirname(dirname(__FILE__)) . '/cache/tmp/');
}

if (function_exists('get_magic_quotes_gpc'))
{
	if (@get_magic_quotes_gpc()) // GPC 进行反向处理
	{
		if (! function_exists('stripslashes_gpc'))
		{
			function stripslashes_gpc(&$value)
			{
				$value = stripslashes($value);
			}
		}
		
		array_walk_recursive($_GET, 'stripslashes_gpc');
		array_walk_recursive($_POST, 'stripslashes_gpc');
		array_walk_recursive($_COOKIE, 'stripslashes_gpc');
		array_walk_recursive($_REQUEST, 'stripslashes_gpc');	
	}
}

if (@ini_get('register_globals'))
{
	if ($_REQUEST)
	{
		foreach ($_REQUEST AS $name => $value)
		{
			unset($$name);
		}
	}
	
	if ($_COOKIE)
	{
		foreach ($_COOKIE AS $name => $value)
		{
			unset($$name);
		}
	}
}

require_once(BOG_PATH . 'ver.inc.php');
require_once(BOG_PATH . 'functions.inc.php');

if (file_exists(BOG_PATH . 'config.inc.php'))
{
	require_once(BOG_PATH . 'config.inc.php');
}

load_class('core_autoload');

date_default_timezone_set('Etc/GMT-8');