<?php include __DIR__.'/../header.php';?>
<div class="col-md-12" style="margin: 40px;">
    <form class="form-inline col-md-6 col-md-offset-3" action="./admin.php" method="post">
      <div class="form-group">
        <label for="exampleInputInviteCode3">密码</label>
        <input type="password" name="password" class="form-control"  placeholder="请输入登录密码">
      </div>
      <button type="submit" class="btn btn-primary">登录</button>
    </form>
</div>
<?php include __DIR__.'/../footer.php';?>