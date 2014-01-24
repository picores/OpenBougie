<?php
/*
 *   Bougie Sina App Engine配置
 *   ========================================
 *   By BOI Station
 *   © 2010 - 2015 All Rights Reserved
 *   http://www.boi.org.cn
 *   ========================================
 *   Support: WebMaster@boi.org.cn
 */

// 定义 Cookies 作用域
define('G_COOKIE_DOMAIN','');

// 定义 Cookies 前缀
define('G_COOKIE_PREFIX','bsae_');

// 定义应用加密 KEY
define('G_SECUKEY','hougreweklrgn');
define('G_COOKIE_HASH_KEY', '13ropjjmkp1e1');

define('G_INDEX_SCRIPT', '?/');

define('X_UA_COMPATIBLE', 'Chrome=1,IE=edge');

// GZIP 压缩输出页面
define('G_GZIP_COMPRESS', TRUE);

// Session 存储类型 (db, file)
define('G_SESSION_SAVE', 'db');

// Session 文件存储路径
define('G_SESSION_SAVE_PATH', '');