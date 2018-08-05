<?php
 /*
  * 图片展示页面
  */

include '../config.php';
include './func.php';
include './header.php';

echo '<title>最近'.$config['showNumber'].'张上传图片 - easyImage</title>';
if ($config['showSwitch']){
	
    $arr = getFile('../'.$config['filePath'].date('Ym'));
    foreach ($arr as $key => $value){
        echo '<div class="col-md-4 col-sm-6 col-lg-3">';
        if ($key<$config['showNumber']){
            $boxImg = $config['domain'].$config['filePath'].date('Ym').'/'.$value;
            echo '<img data-toggle="lightbox" src="'.$boxImg.'" data-image="'.$boxImg.'" data-caption="右键复制图片地址"  class="img-thumbnail" alt="'.$boxImg.'" width="300">';
        }
        echo '</div>';
    }
}else{
    echo '<p class="text-danger">管理员关闭了预览哦~~</p>';
}

include './footer.php';
// echo '<a href="'.$boxImg.'"target="blank">查看原图</a>';


