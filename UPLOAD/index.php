<?php
/*
 *   Bougie Cloud Micro Blog 单入口
 *   ========================================
 *   By BOI Station
 *   © 2010 - 2015 All Rights Reserved
 *   http://www.boi.org.cn
 *   ========================================
 *   Support: WebMaster@boi.org.cn
 */
define('IN_BOPBG', TRUE) or die ( 'Access Denied.' );

if (! file_exists(dirname(__FILE__) . '/system/config/database.php') AND ! file_exists(dirname(__FILE__) . '/system/config/install.lock.php') AND !defined('SAE_TMP_PATH'))
{
	header('Location: ./install/');
	exit;
}

define ( 'PICORES', dirname ( __FILE__ ) . '/system' );
define ( 'PICINSTALL', dirname ( __FILE__ ) . '/install' );

include(PICORES . '/system.php');

BOP_APP::run();