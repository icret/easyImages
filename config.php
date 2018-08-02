<?php
/**
 * @author      pyther <lemonim@qq.com>
 * @time        2018年7月31日00:57:50
 * @thanks      https://github.com/verot/class.upload.php
 * @license     http://opensource.org/licenses/gpl-license.php GNU Public License
 */
/*---------------------------------------*--------------------------------------/
 * 支持设置图片质量
 * 支持文字/图片水印 可自定义文字颜色
 * 支持文字水印背景颜色
 * 支持文字水印透明度
 * 支持上传图片转换为指定格式
 * 支持设置图片指定宽/高
 * 支持限制最低宽度/高度上传
 * 支持静态文件CDN/本地切换
 * 待开发：
 * - 上传图片至远程存储路径
 * - 修复gif上传添加水印成静态的问题
 * - 待完善管理设置
-----------------------------------------*--------------------------------------*/
$config = array (
    'domain'        => 'http://www.test.com/',       // 域名 需要完全书写http?s://domain/
    'maxSize'       => '2097152',                       // 上传文件大小的最大值 默认2M  如需要更大上传请参考php.ini修改
    'filePath'      => 'images/',                       // 图片存储文件夹 末尾需加 '/'
    'language'      =>  'zh_CN',                        // 显示语言 中文繁体 'zh_TW' 美国英语 'en_US'默认为中文简体'zh_CN'
    'png_zip'       => '7',                             // png 图像质量 介于1（快速但大文件）和9（慢速但较小的文件）之间 ，空为不压缩
    'jpeg_zip'      => '85',                            // jpeg图像质量 介于1-100 数值越大质量越高 默认85
    'watermark'     => '1',                             // 是否开启水印 0关闭，1文字水印，2图片水印 gif不能添加水印
    'waterPosition' => 'TB',                            // 水印位置 一个或两个的组合：T=top，B =bottom，L=left，R=right
    'imgConvert'    => '',                              // 是否转换图片为指定格式:('png'|'jpeg'|'gif'|'bmp'|'')空则不转换

    'waterText'     => 'easyImage img.141545.com',		// 指定文字水印 [
    'textDirection' => 'h',                             //     文字方向 水平'h' 垂直'v'
    'textPadding'   => '10',                            //     边距 px
    'textColor'     => '#FF0000',                       //     字体颜色 16色
    'textOpacity'   => '100',                           //     字体透明度 0-100
    'textFont'      => '/static/in-app-ui.ttf',         //     字体路径相对路径
    'fontSize'      => '32',                            //     字体大小
    'text_bg_set'   => false,                           //     是否设置水印背景色 设置true 不设置false
    'text_water_bg' => '#DCDCDC',                       //     背景色 背景大小与边距textPadding有关 空则不显示背景颜色 16色
    'text_bg_opa'   => '50',                            //     背景色透明度 0-100
                                                        //     ]
    'waterImg'      => '/static/watermark.png',         // 图片水印路径 支持GIF,JPG,BMP,PNG和PNG alpha

    'image_resize'  => false,                           // 是否调整图片大小 开启true 关闭false 或''
    'image_ratio'   => false,                           // 是否等比调整图片 开启true 关闭false 或''
    'image_x'       => 750,                             //      调整后的图片宽度
    'image_y'       => 450,                             //      调整后的图片高度

    'image_min_w'   => 100,                             // 上传图片的最小宽度 空为不限制''
    'image_min_h'   => 100,                             // 上传图片的最小高度 空为不限制''

    'static_cdn'    => false,                           // 开启CDN 开启true 关闭false
    'password'      => '000',                     		// 默认密码000 使用crc32加密 修改方法:echo crc32('password')
    'Version'   	=> '1.1.2'                          // 当前版本 numb.*.* 重大改动 *.numb.* 重要改动 *.*.numb 轻微改动
);

// 设置html为utf8
header('Content-Type:text/html;charset=utf-8');
//将时区设置为上海时区
ini_set('date.timezone','Asia/Shanghai');