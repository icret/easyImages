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
            chmod( $config['filePath'], 777);
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

    // 校验登录
    function checkLogin() {
        global $config;
        if (!empty( $_POST['password'] ) ) {
            if ( $_POST['password'] == $config['password'] ) {
                $psw = $_POST['password'];
                setcookie('admin',$psw);
                echo '<code>登录成功</code>';
            }else{
                echo '<code>密码错误</code>';
                exit( include __DIR__ . '/login.php' );
            }
        } elseif (!empty( $_COOKIE['admin'] ) ) {
            if ( $_COOKIE['admin'] == $config['password'] ) {
                echo '';
            }
        } else {
            echo '<code>请登录</code>';
            exit( include __DIR__ . '/login.php' );
        }
    }
    // 判断GIF图片是否为动态
    function isAnimatedGif($filename) {
        $fp = fopen($filename, 'rb');
        $filecontent = fread($fp, filesize($filename));
        fclose($fp);
        return strpos($filecontent, chr(0x21) . chr(0xff) . chr(0x0b) . 'NETSCAPE2.0') === FALSE ? 0 : 1;
    }


    /*
     * getDir()取文件夹列表，getFile()取对应文件夹下面的文件列表,二者的区别在于判断有没有“.”后缀的文件，其他都一样
     * 获取文件目录列表,该方法返回数组
     * 调用方法getDir("./dir")……
     */
    function getDir($dir) {
        $dirArray[]=NULL;
        if (false != ($handle = opendir ( $dir ))) {
            $i=0;
            while ( false !== ($file = readdir ( $handle )) ) {
                //去掉"“.”、“..”以及带“.xxx”后缀的文件
                if ($file != "." && $file != ".."&&!strpos($file,".")) {
                    $dirArray[$i]=$file;
                    $i++;
                }
            }
            //关闭句柄
            closedir ( $handle );
        }
        return $dirArray;
    }

    //获取文件列表
    function getFile($dir) {
        $fileArray[]=NULL;
        if (false != ($handle = opendir ( $dir ))) {
            $i=0;
            while ( false !== ($file = readdir ( $handle )) ) {
                //去掉"“.”、“..”以及带“.xxx”后缀的文件
                if ($file != "." && $file != ".."&&strpos($file,".")) {
                    $fileArray[$i]=$file;
                    if($i==100){
                        break;
                    }
                    $i++;
                }
            }
            //关闭句柄
            closedir ( $handle );
        }
        return $fileArray;
    }

    // 设置一键CDN
    function static_cdn(){
        global $config;
        if ($config['static_cdn']){
            // 开启CDN
            return '
            <link href="https://cdn.bootcss.com/zui/1.8.1/css/zui.min.css" rel="stylesheet">
            <link href="https://cdn.bootcss.com/zui/1.8.1/lib/uploader/zui.uploader.min.css" rel="stylesheet">
            
            <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js?v3.3.1"></script>
            <script src="https://cdn.bootcss.com/zui/1.8.1/js/zui.min.js?v1.8.1"></script>
            <script src="https://cdn.bootcss.com/zui/1.8.1/lib/uploader/zui.uploader.min.js?v1.8.1"></script>
            <script type="text/javascript" src="https://nzeoq1jz0.qnssl.com/qrcode.min.js?v0"></script>
            ';

        }else{
            // 本地文件
            return '
             <link href="../static/zui/css/zui.min.css?v1.8.1" rel="stylesheet">
            <link href="../static/zui/lib/uploader/zui.uploader.min.css?v1.8.1" rel="stylesheet">
            
            <script src="../static/jquery.min.js?v3.3.1"></script>
            <script src="../static/zui/js/zui.min.js?v1.8.1"></script>
            <script src="../static/zui/lib/uploader/zui.uploader.min.js?v1.8.1"></script>
            <script src="../static/qrcode.min.js?v1.0"></script>
            ';
        }
    }

    // 设置广告
    function showAD($where) {
        global $config;
        switch ($where){
            case 'top':
                if ($config['ad_top']){
                    echo file_get_contents($config['domain'].'static/ad_top.html');
                }
                break;
            case 'bot':
                if ($config['ad_bot']){
                    echo file_get_contents($config['domain'].'static/ad_bot.html');
                }
                break;
            default:
                echo '广告函数出错';
                break;
        }
    }

    // 仅允许登录后上传
    function mustLogin(){
        global $config;
        if ($config['mustLogin']){
            checkLogin();
        }
    }

    // 统计代码 如需修改请打开 /static/hm.js
    $hm = file_get_contents(__DIR__.'/../static/hm.js');

    // 删除指定文件
    function del($url){
        // url本地化
        $url = htmlspecialchars(parse_url($url)['path']);   // 过滤html 获取url path
        $url = urldecode(trim(__DIR__.'/..'.$url));
        // 文件是否存在
        if (file_exists($url)){
            // 执行删除
            if (unlink($url)){
                echo '<p class="text-success">删除成功</p>';
            }else{
                echo '<p class="text-danger">删除失败</p>';
            }
        }else{
            echo '<p class="text-danger">文件不存在</p>';
        }
    }
    // 跨域上传
    function crossDomain(){
            global $config;
            if ($config['crossDomain']){
                 echo "'".$config['CDomains'][array_rand($config['CDomains'])]."'";
            }else{
                echo "'file.php'";
            }
    }