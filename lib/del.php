<?php
/*
 * 删除文件
 */
include __DIR__.'/func.php';
include __DIR__.'/header.php';
// 检查登录
checkLogin();

if (isset($_REQUEST['url'])){
    del($_REQUEST['url']);
}
?>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div id="title" style="margin: 10px;"></div>
        <form method="post" action="del.php" id="form">
            <div class="form-group">
                <label for="del" class="required">请输入要删除图片的链接</label>
                <div class="input-group">
                    <span class="input-group-addon">url:</span>
                    <input type="text"  name="url" class="form-control" id="del" placeholder="/images/201808/646f85021cb9ab53.jpg" value="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">删除</button>
        </form>
        </div>
    </div>
    <!-- 批量删除
    <br />
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <form method="post" action="del.php" id="form">
                <div class="form-group">
                    <label for="more_del" class="required">删除多个文件</label>
                    <textarea class="form-control has-error" rows="3" id="more_del" name="del" placeholder="一行一个文件"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">批量删除</button>
            </form>
        </div>
    </div>
    -->
    <script>
        var oBtn = document.getElementById('del');
        var oTi = document.getElementById('title');
        if('oninput' in oBtn){
            oBtn.addEventListener("input",getWord,false);
        }else{
            oBtn.onpropertychange = getWord;
        }
        function getWord(){
            oTi.innerHTML = '<img src="' + oBtn.value + '" width="200" class="img-rounded" /><br />';
        }
    </script>
<?php
include __DIR__.'/footer.php';