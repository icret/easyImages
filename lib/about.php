<?php include './header.php';?>
  <h1 id="h1-easyimage-"><a name="EasyImage 介绍" class="reference-link"></a><span class="header-link octicon octicon-link"></span>EasyImage 介绍</h1>
  <p> 之前一直用的图床程序是:PHP多图长传程序2.4.3<br /> 由于版本过老并且默认使用falsh上传，在当前html5流行大势所趋下，遂利用基础知识新写了一个以html5为默认上传并且支持flash,兼容IE9。<br /> 本代码受到PHP多图片上传程序2.4.3启发,以练习PHP为目而写。 </p>
  <ul> 
   <li>支持设置图片质量</li>
   <li>支持文字/图片水印 可自定义文字颜色</li>
   <li>支持文字水印背景颜色</li>
   <li>支持文字水印透明度</li>
   <li>支持上传图片转换为指定格式</li>
   <li>支持设置图片指定宽/高</li>
   <li>支持限制最低宽度/高度上传</li>
   <li>支持静态文件CDN/本地切换</li>
   <li>
    <ul> 
     <li>待开发：</li>
     <li>上传图片至远程存储路径</li>
     <li>
      <del>
       修复gif上传添加水印成静态的问题
      </del></li>
     <li>在线设置参数</li>
     <li>静态文件CDN/本地切换</li>
    </ul> </li>
  </ul> 
  <hr /> 
  <ul> 
   <li>2018-08-02 v 1.1.2
    <ul> 
     <li>[重要] 修复gif上传添加水印成静态的问题</li>
     <li>修复文字水印背景色不显示问题</li>
     <li>一些代码优化更改</li>
    </ul> </li>
   <li>2018-08-01 1.0.1
    <ul> 
     <li>更改相关文件目录</li>
     <li>优化代码</li>
    </ul> </li>
   <li><p>2018-07-30 1.0.0</p> 
    <ul> 
     <li>最初模型</li>
    </ul> <h4 id="h4-u517Cu5BB9u6027"><a name="兼容性" class="reference-link"></a><span class="header-link octicon octicon-link"></span>兼容性</h4><p>文件上传视图不支持 IE9 以下的浏览器。<br /> 文件上传视图提供文件列表管理和文件批量上传功能，允许拖拽（需要 HTML5 支持）来添加上传文件，支持大文件分片上传，优先使用 HTML5 文件上传功能，旧的浏览器自动使用 Flash 和 Silverlight 的方式兼容。 </p></li>
  </ul> 
  <hr /> 
  <ul> 
   <li>感谢: <a href="https://www.verot.net" title="verot">verot</a> 提供非常好用的class.upload.php上传类 </li>
   <li>感谢: <a href="http://zui.sexy/" title="ZUI">ZUI</a> 提供css框架</li>
   <li>感谢: cctv让我能上Github</li>
   <li>本源码遵循 GNU Public License</li>
  </ul>
<?php include __DIR__.'./footer.php';?>