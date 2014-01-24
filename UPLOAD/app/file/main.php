<?php
/*
+--------------------------------------------------------------------------
|   WeCenter [#RELEASE_VERSION#]
|   ========================================
|   by WeCenter Software
|   © 2011 - 2013 WeCenter. All Rights Reserved
|   http://www.wecenter.com
|   ========================================
|   Support: WeCenter@qq.com
|   
+---------------------------------------------------------------------------
*/


if (!defined('IN_BOPBG'))
{
	die;
}

class main extends AWS_CONTROLLER
{
	public function download_action()
	{
		$url = @base64_decode($_GET['url']);
		
		if (! $url)
		{
			H::redirect_msg(BOP_APP::lang()->_t('文件未找到'));
		}
						
		$path = get_setting('upload_dir') . '/' . str_replace(get_setting('upload_url'), '', $url);
		
		if (strstr($path, '..') OR !file_exists($path))
		{
			H::redirect_msg(BOP_APP::lang()->_t('文件未找到'));
		}
		
		HTTP::force_download_header(base64_decode($_GET['file_name']), filesize($path));
		
		readfile($path);
	}
}