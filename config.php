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
 * 支持开启/关闭浏览最近上传图片
 * 支持仅登录后上传
 * 支持设置广告
 * 支持网站统计 请将统计代码放入:/static/hm.js
 * 支持删除自定义删除图片(仅管理员)
 * 支持上传图片至远程服务器(异域存储)
 * 支持开启/关闭api上传(支持开启/关闭api自定义文字水印)
 * 待开发：
 * - 完善设置管理
-----------------------------------------*--------------------------------------*/
$config = array (
    // 主要设置
    'domain'        => 'http://118.24.143.66/',       // 域名 需要完全书写http?s://domain/
    'maxSize'       => 2097152,                         // 上传文件大小的最大值 默认2M  最大请参考php.ini修改 同时需要修改前端js
    'filePath'      => 'images/',                       // 图片存储文件夹 末尾需加 '/'
    'png_zip'       => 7,                               // png 图像质量 介于1（快速但大文件）和9（慢速但较小的文件）之间 ，空为不压缩
    'jpeg_zip'      => 85,                              // jpeg图像质量 介于1-100 数值越大质量越高 默认85
    'watermark'     => 2,                               // 是否开启水印 0关闭，1文字水印，2图片水印 动态gif不能添加水印
    'waterPosition' => 'TB',                            // 水印位置 一个或两个的组合：T=top，B =bottom，L=left，R=right
    'imgConvert'    => '',                              // 是否转换图片为指定格式:('png'|'jpeg'|'gif'|'bmp'|'')空则不转换
    'mustLogin'     => false,                           // * 仅允许登录后上传 开启true 关闭false
    'crossDomain'   => true,                            // * 是否开启异地上传 开启true 关闭false
    'CDomains'      => [                                // * 异地上传的域名列表 如果只有一个，则默认只使用这个一个。
        'https://img.545141.com/crossdomain/file.php', 	// * 异地上传的域名列表如果有多个，请按照格式书写，会随机调用。最后一个不要加','
        'https://img.545141.com/file.php'
    ],
    'apiStatus'     => true,                            // 是否开启api 开启true 关闭false
    'apiWater'      => true,                            // 是否开启api自定义水印 开启true 关闭false
    // 文字水印设置
    'waterText'     => '简单图床 img.141545.com',		// 指定文字水印 [
    'textDirection' => 'h',                             //     文字方向 水平'h' 垂直'v'
    'textPadding'   => 10,                              //     边距 px
    'textColor'     => '#FF0000',                       //     字体颜色 16色
    'textOpacity'   => 100,                             //     字体透明度 0-100
    'textFont'      => '/static/MicrosoftYaHei.ttf',   //     字体路径相对路径
    'fontSize'      => 23,                              //     字体大小
    'text_bg_set'   => false,                           //     是否设置水印背景色 设置true 不设置false
    'text_water_bg' => '#DCDCDC',                       //     背景色 背景大小与边距textPadding有关 空则不显示背景颜色 16色
    'text_bg_opa'   => 50,                              //     背景色透明度 0-100 ]
    // 图片水印设置
    'waterImg'      => './static/watermark.png',        // 图片水印路径 支持GIF,JPG,BMP,PNG和PNG alpha
    // 压缩图片
    'image_resize'  => false,                           // 是否调整图片大小 开启true 关闭false
    'image_ratio'   => false,                           // 是否等比调整图片 开启true 关闭false
    'image_x'       => 750,                             //      调整后的图片宽度
    'image_y'       => 450,                             //      调整后的图片高度

    'image_min_w'   => 1,                               // 上传图片的最小宽度 空为不限制''
    'image_min_h'   => 1,                               // 上传图片的最小高度 空为不限制''
    // 其他设置
    'password'      => '7576',                     		// 默认密码7576
    'static_cdn'    => true,                            // 开启CDN 开启true 关闭false
    'showSwitch'    => true,                            // * 图片展示开关 开启true 关闭false
    'showNumber'    => 30,                              // * 展示随机最近图片数量
    'ad_top'        => false,                           // * 开启顶部广告
    'ad_bot'        => true,                            // * 开启底部广告
    'language'      => 'zh_CN',                         // 显示语言 中文繁体 'zh_TW' 美国英语 'en_US'默认为中文简体'zh_CN'
    'Version'   	=> '1.5.4'                          // 当前版本 numb.*.* 重大改动 *.numb.* 重要改动 *.*.numb 轻微改动
);

// 设置html为utf8
header('Content-Type:text/html;charset=utf-8');
//将时区设置为上海时区
ini_set('date.timezone','Asia/Shanghai');
// 定义当前目录
define('APP',__DIR__);
