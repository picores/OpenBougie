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

if (! file_exists(dirname(__FILE__) . '/system/config/database.php') AND ! file_exists(dirname(__FILE__) . '/system/config/install.lock.php') AND !defined('SAE_TMP_PATH'))
{
	header('Location: ./install/');
	exit;
}

include('system/system.php');

BOP_APP::run();