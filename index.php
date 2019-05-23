<?php
include './lib/header.php';
mustLogin();
echo '<title>简单图床 - EasyImage</title>';
?>
<div class="container">
  <div class="col-md-12">
    <ul style="list-style: none;margin:1px 1px 30px 1px;">
      <li class="icon icon-dot-circle text-muted">此页面仅作展示使用，每日定时清理，请勿当做图床。单个文件限制2M。</li></ul>
    <div id='upShowID' class="uploader col-md-10 col-md-offset-1" data-ride="uploader" data-url="file.php">
      <div class="uploader-message text-center">
        <div class="content"></div>
        <button type="button" class="close">×</button></div>
      <div class="uploader-files file-list file-list-lg" data-drag-placeholder="选择文件或将图片直接拖拽至此处"></div>
      <div class="uploader-actions">
        <div class="uploader-status pull-right text-muted"></div>
        <button type="button" class="btn btn-link uploader-btn-browse">
          <i class="icon icon-plus"></i>选择文件</button>
        <button type="button" class="btn btn-link uploader-btn-start">
          <i class="icon icon-cloud-upload"></i>开始上传</button>
      </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#" data-target="#tab2Content1" data-toggle="tab">直链</a></li>
        <li>
          <a href="#" data-target="#tab2Content2" data-toggle="tab">论坛代码</a></li>
        <li>
          <a href="#" data-target="#tab2Content3" data-toggle="tab">MarkDown</a></li>
        <li>
          <a href="#" data-target="#tab2Content4" data-toggle="tab">HTML</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade active in" id="tab2Content1">
          <pre class="pre-scrollable" style="text-align: center;min-height: 100px;" id="links"></pre>
        </div>
        <div class="tab-pane fade" id="tab2Content2">
          <pre class="pre-scrollable" style="text-align: center;min-height: 100px;" id="bbscode"></pre>
        </div>
        <div class="tab-pane fade" id="tab2Content3">
          <pre class="pre-scrollable" style="text-align: center;min-height: 100px;" id="markdown"></pre>
        </div>
        <div class="tab-pane fade" id="tab2Content4">
          <pre class="pre-scrollable" style="text-align: center;min-height: 100px;" id="html"></pre>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$('#upShowID').uploader({
	// 当选择文件后立即自动进行上传操作
    autoUpload: false,
	// 文件上传提交地址
    url: <?php crossDomain();?>,
	// 最大支持的上传文件
    max_file_size: '2mb',
	// 是否分片上传 0为不分片 经测试分片容易使图片上传失败
    chunk_size: 0,
	// 上传格式过滤
    filters: 'mime_types' [{
      title: '图片',
      multipart: true,
      extensions: 'jpg,jpeg,tiff,gif,png,gif,webp,wbmp,bmp,nef,cr2'
    },
    {
      title: '图标',
      extensions: 'ico'
    }],
    // 限制文件上传数目
    limitFilesCount: 10,

    responseHandler: function(responseObject, file) {
      // 当服务器返回的文本内容包含 `'success'` 文件上传成功
      if (responseObject.response.indexOf('success')) {
        console.log(responseObject.response);
        var obj = JSON.parse(responseObject.response); //由JSON字符串转换为JSON对象
        var links = document.getElementById("links");
        links.innerHTML += obj.url + "<br />";

        var bbscode = document.getElementById("bbscode");
        bbscode.innerHTML += "[img]" + obj.url + "[/img]<br />";

        var markdown = document.getElementById("markdown");
        markdown.innerHTML += "![](" + obj.url + ")<br />";

        var html = document.getElementById("html");
        html.innerHTML += "&lt;img src=\""+obj.url+"\" /&#62;<br />";
      } else {
        return '上传失败。服务器返回了一个错误：' + responseObject.response;
      }

    }
  });
</script>
<?php include './lib/footer.php';?>