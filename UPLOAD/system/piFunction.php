<?php
    define('IN_BOPBG', TRUE) or die ( 'Access Denied.' );
    
    /**
     * 获取带http的网站域名
     * @return string
     */
    function getHttpUrl() {
        $arrUri = explode ( 'index.php', $_SERVER ['REQUEST_URI'] );
        $site_url = 'http://' . $_SERVER ['HTTP_HOST'] . $arrUri [0];
        return $site_url;
    }
    
    /**
     * 检测目录是否可写1可写，0不可写
     * @param unknown $file
     * @return number
     */
    function iswriteable($file) {
        if (is_dir ( $file )) {
            $dir = $file;
            if ($fp = fopen ( "$dir/test.txt", 'w' )) {
                fclose ( $fp );
                unlink ( "$dir/test.txt" );
                $writeable = 1;
            } else {
                $writeable = 0;
            }
        } else {
            if ($fp = fopen ( $file, 'a+' )) {
                fclose ( $fp );
                $writeable = 1;
            } else {
                $writeable = 0;
            }
        }
        return $writeable;
    }
