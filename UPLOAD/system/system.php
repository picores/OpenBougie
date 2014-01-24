<?php
/*
 *   Bougie Picores 核心底层入口
 *   ========================================
 *   By BOI Station
 *   © 2010 - 2015 All Rights Reserved
 *   http://www.boi.org.cn
 *   ========================================
 *   Support: WebMaster@boi.org.cn
 */

if (! defined('BOG_PATH'))
{
	define('BOG_PATH', dirname(__FILE__) . '/');
}

if (defined('G_GZIP_COMPRESS') AND G_GZIP_COMPRESS === TRUE)
{
	if (@ini_get('zlib.output_compression') == FALSE)
	{
		if (extension_loaded('zlib'))
		{
			if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) AND strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)
			{
				ob_start('ob_gzhandler');
			}
		}
	}
}

require_once (BOG_PATH . 'init.php');

require_once (BOG_PATH . 'bop_app.inc.php');
require_once (BOG_PATH . 'bop_controller.inc.php');
require_once (BOG_PATH . 'bop_model.inc.php');