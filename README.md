![例子](https://img.545141.com/images/201808/daf111c0b24a5753.png "例子")
# EasyImage 简单图床介绍  邮箱:lemonim(at)qq.com
  **支持多文件上传,远程上传,api上传,简单无数据库,直接返回图片url,markdown,bbscode,html的一款图床程序 演示地址： http://t.cn/ReBp80X**
  
  之前一直用的图床程序是:PHP多图长传程序2.4.3
  由于版本过老并且使用falsh上传，在当前html5流行大势所趋下，遂利用基础知识新写了一个以html5为默认上传并且支持flash,兼容至IE9。
  
  本代码受到PHP多图片上传程序2.4.3启发,以练习PHP为目而写。
  js不要设置分片上传大小，此会导致部分图片上传失败。
  当上传失败时默认最大尝试3次。
  **使用前请注意先修改config.php中的domain域名为自己的！**
  
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
 * - 已知宝塔面板(bt.cn)安装后会出现上传500错误，错误未知。

---
# 异地上传[跨域上传] 教程
1. 将 **crossdomain** 文件夹内的所有文件和**config.php**拷贝到新的服务器
2. 把 **crossdomain** 的上层文件夹赋予 **0777** 权限，同时把所有有文件赋予 **0777** 权限。
3. 修改新服务器的 **config.php** 的 **"domain"**为当前域名（末尾有'/'）
4. 修改原服务器的 **config.php** 的 **'crossDomain'** 为 **true** (开启true 关闭false)
5. 修改原服务器的 **config.php** 的 **'CDomains'** 为 http：//www.新服务器.com/crossdmain/file.php
## 异地上传示例
* 我有一个域名a.com，同时想随机上传到b.com，c.com等域名。
* 首先把a.com服务器的 **crossdomain** 文件夹和 **config.php** 文件拷贝到b.com,c.com等主机。
* 修改复制过去的 **config.php** 里边的 **"domain"** 为当前域名 比如b.com修改成`'domain'=>'http：//b.com/t/file.php',`
c.com也同样改成`'domain'=>'http：//c.com/t/file.php',` 。注意要写完整路径
* 把复制过去的 **crossdomian** 文件夹 和所有文件赋予 **0777** 权限 (chmod -R 0777 /www/wwwroot/xxx/crossdomain)。
* 然后把修改a.com的 **config.php** ，开启跨域上传 `'crossDomain'   => true,` ,并修改：
`'CDomains'      => [
'http：//a.com/t/file.php',
'http：//b.com/t/file.php',
'http：//c.com/t/file.php'
]`
注意标点符号，最后一个域名后边没有','
* 这样就好啦，可以测试一下了。如果有改动，请直接修改a.com的 **config.php** 然后复制到各个主机即可。

# api上传示例

## 请求
| 功能  | 上传图片接口  |
| :------------: | :------------: |
| HTTP 请求方式  | POST  |
| URL  |  https://img.545141.com/api.php |
## 参数
|  参数名称 | 类型  |是否必须 | 说明 |
| :------------: | :------------: | :------------: | :------------: |
|  file | File | 是 |  表单名称  |
|  apiWaterText |  Hidden  |  否  |  自定义上传的文字水印  |

## 返回json数据说明
| 名称  |  类型 | 示例值| 说明 |
| :------------: | :------------: | :------------: | :------------: |
| result  | String  | success | 上传文件状态。成功为 success 错误为 failed |
|  message |  String | ``` https:\/\/img.545141.com\/images\/201808\/16faa5601aec0cd0.jpg ``` |如果成功返回url,错误则显示描述 |

## 成功响应示例
```json
{"result":"success","url":"https:\/\/img.545141.com\/images\/201808\/16faa5601aec0cd0.jpg"}
```
## 错误示例
```json
{"result":"failed","message":"API已经关闭。"}
{"result":"failed","message":"请输入合法参数。"}
```
## 上传示例
```html
<form action="https://img.545141.com/api.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="hidden" name="apiWaterText" value="www.test.com">
    <input type="submit" value="上传">
</form>
```
---
* 2018-8-16 v1.6.3
 - 支持开启/关闭api上传(支持开启/关闭api自定义文字水印)
 - 修复权限错误
 - 修复二级目录引入错误
 
* 2018-8-8 v1.5.3
 - 添加上传图片至远程主机
 - 修复逻辑
 
* 2018-8-6 v1.4.3
 - 添加网站统计
 - 添加删除上传文件
 - 调整config.php
 
* 2018-8-5 v1.4.2
 - 添加仅登录后上传
 - 修复一处逻辑错误
 - 修复一个漏洞
 
* 2018-8-4 v1.3.2
 - 添加广告设置
 - 完善引入机制
 
* 2018-8-3 v1.2.2
 - [重要]修复水印图片不能添加
 - 添加随机浏览上传图片 可以设定浏览数量和关闭浏览
 - 优化代码，删除无用文件
 - 完善一键CDN静态文件

* 2018-08-02 v1.1.2
 - [重要] 修复gif上传添加水印成静态的问题
 - 修复文字水印背景色不显示问题
 - 修复在linux下的权限错误
 -  一些优化更改
 
* 2018-08-01 v1.0.1
 - 更改相关文件目录
 - 优化代码
 
* 2018-07-30 v1.0.0
 - 最初模型
 
 ### 兼容性 
文件上传视图不支持IE9以下的浏览器,api不限制,5.6<php<7.0+ 。
文件上传视图提供文件列表管理和文件批量上传功能，允许拖拽（需要 HTML5  支持）来添加上传文件，支持大文件分片上传，优先使用    HTML5 文件上传功能，旧的浏览器自动使用 Flash 和  Silverlight 的方式兼容。
   
----
  - 感谢: [verot](https://www.verot.net "verot") 提供非常好用的class.upload.php上传类  
  - 感谢: [ZUI](http://zui.sexy/ "ZUI") 提供css框架
  - 感谢: cctv让我能上Github
  - 本源码遵循 GNU Public License