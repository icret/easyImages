<?php
    /*
     * 所有使用到的函数集合
     */
    include __DIR__.'/../config.php';
    // 图片重命名 截取0-16位毫秒时间戳md5
    function config_rename(){
        return substr(md5(microtime()),0,16);
    }

    // 设置的存储路径检查是否存在、可写
    function config_path(){
        global $config;
        // 判断$config['filePath']文件夹是否存在 是否可写
        if (!is_dir($config['filePath'])) {
            mkdir( $config['filePath'], 0777);
        }elseif (!is_writable($config['filePath'])) {
            chmod( $config['filePath'], 0777);
        }

        // 图片默认上传文件夹是否存在、可写
        $config_filePath = $config['filePath'].date('Ym');

        if (!is_dir($config_filePath)){
            mkdir($config_filePath,0777);
        }elseif (!is_writable($config_filePath)){
            chmod($config_filePath,0777);
        }
        return $config_filePath.'/';
    }

    // 判断GIF图片是否为动态
    function isAnimatedGif($filename) {
        $fp = fopen($filename, 'rb');
        $filecontent = fread($fp, filesize($filename));
        fclose($fp);
        return strpos($filecontent, chr(0x21) . chr(0xff) . chr(0x0b) . 'NETSCAPE2.0') === FALSE ? 0 : 1;
    }