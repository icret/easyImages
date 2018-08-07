<?php
include_once __DIR__.'/func.php';

    if (@$_GET['outLogin']==1){
        setcookie('admin',null);
        echo '<code>退出成功</code>';
    }
echo '
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="'.$config['domain'].'/static/icon/speed_plane_32px.ico"  type="image/x-icon" />
    '.static_cdn().'
    <style>
        .uploader-files{
            min-height:120px;
            border-style:dashed;
        }
    </style>
</head>
<body class="container">
    '.showAD('top').'
    <div class="md-lg-12 header-dividing">
        <ul class="nav nav-pills">
            <li class="active"><a href="../index.php">Index</a></li>
            <li><a href="https://github.com/icret/easyImages" target="_blank">GitHub<span class="label label-badge label-success"></span></a></li>
            <li><a href="'.$config['domain'].'/about.php">About<span class="label label-badge label-success"></span></a></li>
            <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">More<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="'.$config['domain'].'lib/list.php">浏览</a></li>
            <li><a href="'.$config['domain'].'lib/del.php">删除</a></li>
            <li><a href="../admin.php">设置</a></li>
            <li><a href="../index.php?outLogin=1">退出</a></li>
        </ul>
            </li>
            <li><a class="dropdown-toggle hidden-xs" data-toggle="dropdown" href="#">QrCode<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <input id="text" type="hidden" value=""/>
                    <li id="qrcode" style="width:100%;">扫描二维码使用手机上传</li>
                </ul>
            </li>
        </ul>
    </div>
<!-- 顶部导航栏END -->
    ';