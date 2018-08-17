<?php
// 载入文件
require __DIR__.'/lib/class.upload.php';
require __DIR__.'/lib/func.php';
// 制定允许其他域名访问
header("Access-Control-Allow-Origin:*");

$handle = new upload($_FILES['file'],$config['language']);
if ($handle->uploaded){
    // 图片重命名
    $handle->file_new_name_body = 'cross_'.config_rename();
    // 允许上传大小
    $handle->file_max_size = $config['maxSize'];
    // 允许上传的mime类型
    $handle->allowed = array ('image/*');
	// 
    // 设置PNG图片的压缩级别
    $handle->png_compression = $config['png_zip'];
    // 设置jpeg图片的压缩级别
    $handle->jpeg_quality = $config['jpeg_zip'];
    // 设置转换上传图片为指定格式
    $handle->image_convert = $config['imgConvert'];

    // 限制最小上传图片宽度
    $handle->image_min_width = $config['image_min_w'];
    // 限制最小上传图片高度
    $handle->image_min_height = $config['image_min_h'];

    // 裁剪图片
    if ($config['image_resize']){
        $handle->image_resize = true;
        if ($config['image_ratio']){
            $handle->image_ratio = true;
            $handle->image_x = $config['image_x'];
            $handle->image_y = $config['image_y'];
        }else{
            $handle->image_x = $config['image_x'];
            $handle->image_y = $config['image_y'];
        }
    }

    // 调用水印
    if ($config['watermark'] > 0){
        switch ($config['watermark']){
            case 1: // 文字水印 过滤gif
                if (isAnimatedGif($handle->file_src_pathname)===0){
                    $handle->image_text = $config['waterText'];
                    $handle->image_text_direction = $config['textDirection'];
                    $handle->image_text_color = $config['textColor'];
                    $handle->image_text_opacity = $config['textOpacity'];
                    $handle->image_text_font = $config['textFont'];
                    $handle->image_text_padding = $config['textPadding'];
                    $handle->image_text_position = $config['waterPosition'];
                    // 设置背景色
                    if ($config['text_bg_set']){
                        $handle->image_text_background = $config['text_water_bg'];
                        $handle->image_text_background_opacity = $config['text_bg_opa'];
                    }
                }
                break;
            case 2: // 图片水印
                if (isAnimatedGif($handle->file_src_pathname)===0){
                    $handle->image_watermark             = $config['waterImg'];
                    $handle->image_watermark_position    = $config['waterPosition'];
                    $handle->image_watermark_no_zoom_in  = true;
                    $handle->image_watermark_no_zoom_out = true;
                }
                break;
            default:
                echo $handle->error;
                break;
        }
    }

    // 存储图片路径:images/201807/
    $handle->process(config_path());

    // 图片完整相对路径:images/201807/0ed7ccfd4dab9cbc.jpg
    if ($handle->processed){		
		header('Content-type:text/json');
        // 上传成功后返回json数据
        $reJson = array (
            "result"    =>  'success',
            "url"       =>  $config['domain'].config_path().$handle->file_dst_name,
        );
        echo json_encode($reJson);		
        $handle->clean();
    }else{
        // 上传错误 返回错误信息
        $reJson = array (
            "result"      =>  'failed',
            "message"     =>  $handle->error
        );
        echo json_encode($reJson);
        echo $handle->error;
    }
}