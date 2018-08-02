<?php
include __DIR__.'/../config.php';
echo '
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../static/icon/speed_plane_32px.ico"  type="image/x-icon" />
    <title>图床 - EasyImage</title>
    <link href="../static/zui/css/zui.min.css?v1.8.1" rel="stylesheet">
    <link href="../static/zui/lib/uploader/zui.uploader.min.css?v1.8.1" rel="stylesheet">
    <style>
        .uploader-files{
            min-height:120px;
            border-style:dashed;
        }
    </style>
</head>
<body class="container">
    <div class="md-lg-12 header-dividing">
        <ul class="nav nav-pills">
            <li class="active"><a href="../index.php">Index</a></li>
            <li><a href="https://github.com/icret/easyImages" target="_blank">GitHub<span class="label label-badge label-success"></span></a></li>
            <li><a href="#">Help<span class="label label-badge label-success"></span></a></li>
            <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">More<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="../admin.php">设置</a></li>
        </ul>
            </li>
            <li><a class="dropdown-toggle hidden-xs" data-toggle="dropdown" href="#">QrCode<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <input id="text" type="hidden" value=""/>
                    <li>扫描二维码使用手机上传</li>
                    <li id="qrcode" style="width:100%;"></li>
                </ul>
            </li>
        </ul>
    </div>
<!-- 顶部导航栏END -->
    ';