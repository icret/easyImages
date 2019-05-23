<?php
require __DIR__.'/func.php';
// 如果有url=?*的请求 则删除文件
if (isset($_REQUEST['url'])){
    if ($_REQUEST['auth'] === $config['crossDelHash']){
        getDel($_REQUEST['url']);
    }else{
        echo '<p class="text-danger">认证失败</p>';
    }
    header('Refresh:2,Url='.$_SERVER["HTTP_REFERER"]);
    exit();
}
