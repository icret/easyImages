<?php include __DIR__.'/lib/header.php';
echo '<title>关于简单图床 - EasyImage</title>';
?>  
    <body>
  <p>
    <img src="https://img.545141.com/images/201808/daf111c0b24a5753.png" alt="例子" title="例子"></p>
  <h1 id="h1-easyimage-">
    <a name="EasyImage 简单图床 介绍" class="reference-link"></a>
    <span class="header-link octicon octicon-link"></span>EasyImage 简单图床 介绍</h1>
  <p>支持多文件上传,远程上传,简单无数据库直接返回图片url的一款图床程序
    <br>之前一直用的图床程序是:PHP多图长传程序2.4.3
    <br>由于版本过老并且使用falsh上传，在当前html5流行大势所趋下，遂利用基础知识新写了一个以html5为默认上传并且支持flash,兼容至IE9。</p>
  <p>本代码受到PHP多图片上传程序2.4.3启发,以练习PHP为目而写。
    <br>js不要设置分片上传大小，此会导致部分图片上传失败。
    <br>当上传失败时默认最大尝试3次。
    <br>
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
    <li>支持删除自定义删除图片</li>
    <li>上传图片至远程存储路径</li>
    <li>待开发：</li>
    <li>
      <ul>
        <li>完善管理设置</li></ul>
    </li>
    <li>
      <ul>
        <li>修复中文水印乱码</li></ul>
    </li>
  </ul>
  <hr>
  <h1 id="h1--">
    <a name="异地上传[跨域上传] 教程" class="reference-link"></a>
    <span class="header-link octicon octicon-link"></span>异地上传[跨域上传] 教程</h1>
  <ol>
    <li>将
      <strong>crossdomain</strong>文件夹内的所有文件和
      <strong>config.php</strong>拷贝到新的服务器</li>
    <li>把
      <strong>crossdomain</strong>的上层文件夹赋予
      <strong>0777</strong>权限，同时把所有有文件赋予
      <strong>0777</strong>权限。</li>
    <li>修改新服务器的
      <strong>config.php</strong>的
      <strong>“domain”</strong>为当前域名（末尾有’/‘）</li>
    <li>修改原服务器的
      <strong>config.php</strong>的
      <strong>‘crossDomain’</strong>为
      <strong>true</strong>(开启true 关闭false)</li>
    <li>修改原服务器的
      <strong>config.php</strong>的
      <strong>‘CDomains’</strong>为 http：//www.新服务器.com/crossdmain/file.php</li></ol>
  <h2 id="h2-u4E3Eu4F8B">
    <a name="举例" class="reference-link"></a>
    <span class="header-link octicon octicon-link"></span>举例</h2>
  <ul>
    <li>我有一个域名a.com，同时想随机上传到b.com，c.com等域名。</li>
    <li>首先把a.com服务器的
      <strong>crossdomain</strong>文件夹和
      <strong>config.php</strong>文件拷贝到b.com,c.com等主机。</li>
    <li>修改复制过去的
      <strong>config.php</strong>里边的
      <strong>“domain”</strong>为当前域名 比如b.com修改成
      <code>'domain'=&gt;'http：//b.com/t/file.php',</code>
      <br>c.com也同样改成
      <code>'domain'=&gt;'http：//c.com/t/file.php',</code>。注意要写完整路径</li>
    <li>把复制过去的
      <strong>crossdomian</strong>文件夹 和所有文件赋予
      <strong>0777</strong>权限 (chmod -R 0777 /www/wwwroot/xxx/crossdomain)。</li>
    <li>然后把修改a.com的
      <strong>config.php</strong>，开启跨域上传
      <code>'crossDomain' =&gt; true,</code>,并修改：
      <br>
      <code>'CDomains' =&gt; [ 'http：//b.com/t/file.php', 'http：//c.com/t/file.php' ]</code>
      <br>注意标点符号，最后一个域名后边没有’,’</li>
    <li>这样就好啦，可以测试一下了。如果有改动，请直接修改a.com的
      <strong>config.php</strong>然后复制到各个主机即可。</li></ul>
  <hr>
  <ul>
    <li>
      <p>2018-8-8 v1.5.3</p>
      <ul>
        <li>添加上传图片只远程主机</li>
        <li>修复逻辑</li></ul>
    </li>
    <li>
      <p>2018-8-6 v1.4.3</p>
      <ul>
        <li>添加网站统计</li>
        <li>添加删除上传文件</li>
        <li>调整config.php</li></ul>
    </li>
    <li>
      <p>2018-8-5 v1.4.2</p>
      <ul>
        <li>添加仅登录后上传</li>
        <li>修复一处逻辑错误</li>
        <li>修复一个漏洞</li></ul>
    </li>
    <li>
      <p>2018-8-4 v1.3.2</p>
      <ul>
        <li>添加广告设置</li>
        <li>完善引入机制</li></ul>
    </li>
    <li>
      <p>2018-8-3 v1.2.2</p>
      <ul>
        <li>[重要]修复水印图片不能添加</li>
        <li>添加随机浏览上传图片 可以设定浏览数量和关闭浏览</li>
        <li>优化代码，删除无用文件</li>
        <li>完善一键CDN静态文件</li></ul>
    </li>
    <li>
      <p>2018-08-02 v1.1.2</p>
      <ul>
        <li>[重要] 修复gif上传添加水印成静态的问题</li>
        <li>修复文字水印背景色不显示问题</li>
        <li>修复在linux下的权限错误</li>
        <li>一些优化更改</li></ul>
    </li>
    <li>
      <p>2018-08-01 v1.0.1</p>
      <ul>
        <li>更改相关文件目录</li>
        <li>优化代码</li></ul>
    </li>
    <li>
      <p>2018-07-30 v1.0.0</p>
      <ul>
        <li>最初模型</li></ul>
      <h3 id="h3-u517Cu5BB9u6027">
        <a name="兼容性" class="reference-link"></a>
        <span class="header-link octicon octicon-link"></span>兼容性</h3>
      <p>文件上传视图不支持IE9以下的浏览器。
        <br>文件上传视图提供文件列表管理和文件批量上传功能，允许拖拽（需要 HTML5 支持）来添加上传文件，支持大文件分片上传，优先使用 HTML5 文件上传功能，旧的浏览器自动使用 Flash 和 Silverlight 的方式兼容。</p></li>
  </ul>
  <hr>
  <ul>
    <li>感谢:
      <a href="https://www.verot.net" title="verot">verot</a>提供非常好用的class.upload.php上传类</li>
    <li>感谢:
      <a href="http://zui.sexy/" title="ZUI">ZUI</a>提供css框架</li>
    <li>感谢: cctv让我能上Github</li>
    <li>本源码遵循 GNU Public License</li></ul>
</body>
<?php include __DIR__.'/lib/footer.php';?>