<?php include __DIR__.'/header.php';
echo '<title>关于简单图床 - EasyImage</title>';
?>  

<p><img src="https://img.545141.com/images/201808/daf111c0b24a5753.png" alt="例子" title="例子"></p>
<h1><a id="EasyImage___lemonimatqqcom_1"></a>EasyImage 简单图床介绍  邮箱:lemonim(at)<a href="http://qq.com">qq.com</a></h1>
<p><strong>支持多文件上传,远程上传,api上传,简单无数据库,直接返回图片url,markdown,bbscode,html的一款图床程序 演示地址： <a href="http://t.cn/ReBp80X">http://t.cn/ReBp80X</a></strong></p>
<p>之前一直用的图床程序是:PHP多图长传程序2.4.3<br>
由于版本过老并且使用falsh上传，在当前html5流行大势所趋下，遂利用基础知识新写了一个以html5为默认上传并且支持flash,兼容至IE9。</p>
<p>本代码受到PHP多图片上传程序2.4.3启发,以练习PHP为目而写。<br>
js不要设置分片上传大小，此会导致部分图片上传失败。<br>
当上传失败时默认最大尝试3次。<br>
<strong>使用前请注意先修改config.php中的domain域名为自己的！</strong></p>
<ul>
<li>支持设置图片质量</li>
<li>支持文字/图片水印 可自定义文字颜色</li>
<li>支持文字水印背景颜色</li>
<li>支持文字水印透明度</li>
<li>支持上传图片转换为指定格式</li>
<li>支持设置图片指定宽/高</li>
<li>支持限制最低宽度/高度上传</li>
<li>支持静态文件CDN/本地切换</li>
<li>支持开启/关闭浏览最近上传图片</li>
<li>支持仅登录后上传</li>
<li>支持设置广告</li>
<li>支持网站统计 请将统计代码放入:/static/hm.js</li>
<li>支持删除自定义删除图片(仅管理员)</li>
<li>支持上传图片至远程服务器(异域存储)</li>
<li>支持开启/关闭api上传(支持开启/关闭api自定义文字水印)</li>
<li>待开发：</li>
<li>
<ul>
<li>完善设置管理</li>
</ul>
</li>
<li>
<ul>
<li>已知宝塔面板(<a href="http://bt.cn">bt.cn</a>)安装后会出现上传500错误，错误未知。</li>
</ul>
</li>
</ul>
<hr>
<h1><a id="__32"></a>异地上传[跨域上传] 教程</h1>
<ol>
<li>将 <strong>crossdomain</strong> 文件夹内的所有文件和<strong>config.php</strong>拷贝到新的服务器</li>
<li>把 <strong>crossdomain</strong> 的上层文件夹赋予 <strong>0777</strong> 权限，同时把所有有文件赋予 <strong>0777</strong> 权限。</li>
<li>修改新服务器的 <strong>config.php</strong> 的 **“domain”**为当前域名（末尾有’/’）</li>
<li>修改原服务器的 <strong>config.php</strong> 的 <strong>‘crossDomain’</strong> 为 <strong>true</strong> (开启true 关闭false)</li>
<li>修改原服务器的 <strong>config.php</strong> 的 <strong>‘CDomains’</strong> 为 http：<a href="//www.xn--zfru1gj3r5jb.com/crossdmain/file.php">//www.新服务器.com/crossdmain/file.php</a></li>
</ol>
<h2><a id="_38"></a>异地上传示例</h2>
<ul>
<li><a href="http://xn--a-zn6a4e24wy9empsogi.com">我有一个域名a.com</a>，<a href="http://xn--b-ko6as8av3g6zci04au6hdsc1t6o.com">同时想随机上传到b.com</a>，c.com等域名。</li>
<li>首先把a.com服务器的 <strong>crossdomain</strong> 文件夹和 <strong>config.php</strong> <a href="http://xn--b-116a46h38yx3clp6f.com">文件拷贝到b.com</a>,c.com等主机。</li>
<li>修改复制过去的 <strong>config.php</strong> 里边的 <strong>“domain”</strong> 为当前域名 比如b.com修改成<code>'domain'=&gt;'http：//b.com/t/file.php',</code><br>
c.com也同样改成<code>'domain'=&gt;'http：//c.com/t/file.php',</code> 。注意要写完整路径</li>
<li>把复制过去的 <strong>crossdomian</strong> 文件夹 和所有文件赋予 <strong>0777</strong> 权限 (chmod -R 0777 /www/wwwroot/xxx/crossdomain)。</li>
<li>然后把修改a.com的 <strong>config.php</strong> ，开启跨域上传 <code>'crossDomain' =&gt; true,</code> ,并修改：<br>
<code>'CDomains' =&gt; [ 'http：//a.com/t/file.php', 'http：//b.com/t/file.php', 'http：//c.com/t/file.php' ]</code><br>
注意标点符号，最后一个域名后边没有’,’</li>
<li>这样就好啦，可以测试一下了。如果有改动，请直接修改a.com的 <strong>config.php</strong> 然后复制到各个主机即可。</li>
</ul>
<h1><a id="api_53"></a>api上传示例</h1>
<h2><a id="_55"></a>请求</h2>
<table class="table table-striped table-bordered">
<thead>
<tr>
<th style="text-align:center">功能</th>
<th style="text-align:center">上传图片接口</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:center">HTTP 请求方式</td>
<td style="text-align:center">POST</td>
</tr>
<tr>
<td style="text-align:center">URL</td>
<td style="text-align:center"><a href="https://img.545141.com/api.php">https://img.545141.com/api.php</a></td>
</tr>
</tbody>
</table>
<h2><a id="_60"></a>参数</h2>
<table class="table table-striped table-bordered">
<thead>
<tr>
<th style="text-align:center">参数名称</th>
<th style="text-align:center">类型</th>
<th style="text-align:center">是否必须</th>
<th style="text-align:center">说明</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:center">file</td>
<td style="text-align:center">File</td>
<td style="text-align:center">是</td>
<td style="text-align:center">表单名称</td>
</tr>
<tr>
<td style="text-align:center">apiWaterText</td>
<td style="text-align:center">Hidden</td>
<td style="text-align:center">否</td>
<td style="text-align:center">自定义上传的文字水印</td>
</tr>
</tbody>
</table>
<h2><a id="json_66"></a>返回json数据说明</h2>
<table class="table table-striped table-bordered">
<thead>
<tr>
<th style="text-align:center">名称</th>
<th style="text-align:center">类型</th>
<th style="text-align:center">示例值</th>
<th style="text-align:center">说明</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:center">result</td>
<td style="text-align:center">String</td>
<td style="text-align:center">success</td>
<td style="text-align:center">上传文件状态。成功为 success 错误为 failed</td>
</tr>
<tr>
<td style="text-align:center">message</td>
<td style="text-align:center">String</td>
<td style="text-align:center"><code>https:\/\/img.545141.com\/images\/201808\/16faa5601aec0cd0.jpg</code></td>
<td style="text-align:center">如果成功返回url,错误则显示描述</td>
</tr>
</tbody>
</table>
<h2><a id="_72"></a>成功响应示例</h2>
<pre><code class="language-json">{"<span class="hljs-attribute">result</span>":<span class="hljs-value"><span class="hljs-string">"success"</span></span>,"<span class="hljs-attribute">url</span>":<span class="hljs-value"><span class="hljs-string">"https:\/\/img.545141.com\/images\/201808\/16faa5601aec0cd0.jpg"</span></span>}
</code></pre>
<h2><a id="_76"></a>错误示例</h2>
<pre><code class="language-json">{"<span class="hljs-attribute">result</span>":<span class="hljs-value"><span class="hljs-string">"failed"</span></span>,"<span class="hljs-attribute">message</span>":<span class="hljs-value"><span class="hljs-string">"API已经关闭。"</span></span>}
{"<span class="hljs-attribute">result</span>":<span class="hljs-value"><span class="hljs-string">"failed"</span></span>,"<span class="hljs-attribute">message</span>":<span class="hljs-value"><span class="hljs-string">"请输入合法参数。"</span></span>}
</code></pre>
<h2><a id="_81"></a>上传示例</h2>
<pre><code class="language-html"><span class="hljs-tag">&lt;<span class="hljs-title">form</span> <span class="hljs-attribute">action</span>=<span class="hljs-value">"https://img.545141.com/api.php"</span> <span class="hljs-attribute">method</span>=<span class="hljs-value">"post"</span> <span class="hljs-attribute">enctype</span>=<span class="hljs-value">"multipart/form-data"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"file"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"file"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"hidden"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"apiWaterText"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"www.test.com"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"submit"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"上传"</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">form</span>&gt;</span>
</code></pre>
<hr>
<ul>
<li>2018-8-16 v1.6.3</li>
</ul>
<ul>
<li>支持开启/关闭api上传(支持开启/关闭api自定义文字水印)</li>
<li>修复权限错误</li>
<li>修复二级目录引入错误</li>
</ul>
<ul>
<li>2018-8-8 v1.5.3</li>
</ul>
<ul>
<li>添加上传图片至远程主机</li>
<li>修复逻辑</li>
</ul>
<ul>
<li>2018-8-6 v1.4.3</li>
</ul>
<ul>
<li>添加网站统计</li>
<li>添加删除上传文件</li>
<li>调整config.php</li>
</ul>
<ul>
<li>2018-8-5 v1.4.2</li>
</ul>
<ul>
<li>添加仅登录后上传</li>
<li>修复一处逻辑错误</li>
<li>修复一个漏洞</li>
</ul>
<ul>
<li>2018-8-4 v1.3.2</li>
</ul>
<ul>
<li>添加广告设置</li>
<li>完善引入机制</li>
</ul>
<ul>
<li>2018-8-3 v1.2.2</li>
</ul>
<ul>
<li>[重要]修复水印图片不能添加</li>
<li>添加随机浏览上传图片 可以设定浏览数量和关闭浏览</li>
<li>优化代码，删除无用文件</li>
<li>完善一键CDN静态文件</li>
</ul>
<ul>
<li>2018-08-02 v1.1.2</li>
</ul>
<ul>
<li>[重要] 修复gif上传添加水印成静态的问题</li>
<li>修复文字水印背景色不显示问题</li>
<li>修复在linux下的权限错误</li>
<li>一些优化更改</li>
</ul>
<ul>
<li>2018-08-01 v1.0.1</li>
</ul>
<ul>
<li>更改相关文件目录</li>
<li>优化代码</li>
</ul>
<ul>
<li>2018-07-30 v1.0.0</li>
</ul>
<ul>
<li>最初模型</li>
</ul>
<h3><a id="_132"></a>兼容性</h3>
<p>文件上传视图不支持IE9以下的浏览器。<br>
文件上传视图提供文件列表管理和文件批量上传功能，允许拖拽（需要 HTML5  支持）来添加上传文件，支持大文件分片上传，优先使用    HTML5 文件上传功能，旧的浏览器自动使用 Flash 和  Silverlight 的方式兼容。</p>
<hr>
<ul>
<li>感谢: <a href="https://www.verot.net" title="verot">verot</a> 提供非常好用的class.upload.php上传类</li>
<li>感谢: <a href="http://zui.sexy/" title="ZUI">ZUI</a> 提供css框架</li>
<li>感谢: cctv让我能上Github</li>
<li>本源码遵循 GNU Public License</li>
</ul>

<?php include __DIR__.'/footer.php';?>