<?php
    defined('IN_BOPBG') or die('Access Denied.');
    
    if (substr(PHP_VERSION, 0, 1) != '5')exit("OpenBougie运行环境要求PHP5以上！");
    
    //核心配置文件 $PI_CF 系统配置变量
    $PI_CF = include 'piConfig.php';
    
    // 如果是调试模式，打开警告输出
    if ($PI_CF['debug']) {
        if( substr(PHP_VERSION, 0, 3) == "5.3" ){
            error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
        }else{
            error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
        }
    } else {
        error_reporting(0);
    }
    
    ini_set('session.cookie_path', '/');
    
    //加载基础函数
    include 'piFunction.php';
    
    //处理html编码
    header('Content-Type: text/html; charset=UTF-8');
    
    //安装专用变量
    $install = isset($_GET['install']) ? $_GET['install'] : 'index';
    
    //安装配置文件，数据库配置判断
    if(!is_file('system/config/config.inc.php')){
        include 'install/index.php';
        exit;
    }
    
    
