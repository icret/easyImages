<?php
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
            mkdir( $config['filePath'], 0777, true );
        }elseif (!is_writable($config['filePath'])) {
            chmod( $config['filePath'], 0777);
        }

        // 图片默认上传文件夹是否存在、可写
        $config_filePath = $config['filePath'].date('Ym');

        if (!is_dir($config_filePath)){
            mkdir($config_filePath,0777,true);
        }elseif (!is_writable($config_filePath)){
            chmod($config_filePath,0777);
        }
        return $config_filePath.'/';
    }
    // 设置CDN
    if ($config['static_cdn']){
        // 设置CDN
    }else{
        //css
        echo '';

    }

    // 校验登录
    function checkLogin() {
        global $config;
        if (!empty( $_POST['password'] ) ) {
            if ( $_POST['password'] == $config['password'] ) {
                $psw = $_POST['password'];
                setcookie('admin',$psw);
            }else{
                echo '密码错误';
                exit( include __DIR__ . '/login.php' );
            }
        } elseif (!empty( $_COOKIE['admin'] ) ) {
            if ( $_COOKIE['admin'] == $config['password'] ) {
                echo '登录成功';
            }
        } else {
            echo '请登录';
            exit( include __DIR__ . '/login.php' );
        }
    }