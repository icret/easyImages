<?php include __DIR__.'/lib/header.php';
echo '<title>关于简单图床 - EasyImage</title>';
?>  
    <body>
    <p>
      <img src="https://img.545141.com/images/201808/daf111c0b24a5753.png" alt="例子" title="例子"></p>
    <h1 id="h1-easyimage-">
      <a name="EasyImage 简单图床 介绍" class="reference-link"></a>
      <span class="header-link octicon octicon-link"></span>EasyImage 简单图床 介绍</h1>
    <p>之前一直用的图床程序是:PHP多图长传程序2.4.3
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
      <li>支持浏览最近上传图片</li>
      <li>支持设置广告</li>
      <li>
        <ul>
          <li>待开发：</li>
          <li>上传图片至远程存储路径</li>
          <li>完善管理设置</li>
          <li>修复中文水印乱码</li></ul>
      </li>
    </ul>
    <hr>
    <ul>
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