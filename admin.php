<?php
include './config.php';
include './lib/func.php';
// 校验登录
checkLogin();
include './header.php';
?>
    <div class="container-fixed">
        <div class="alert with-icon">
            <i class="icon-ok-sign"></i>
            <div class="content">请根据需要修改参数，修改后请及时测试，如出现错误请使用备份文件<code>/common/config.default.php</code>覆盖:</div></div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-xs-3">
                    <ul class="nav nav-tabs nav-stacked">
                        <li class="active">
                            <a href="###" data-target="#tab3Content1" data-toggle="tab">主要配置</a></li>
                        <li>
                            <a href="###" data-target="#tab3Content2" data-toggle="tab">文字水印配置</a></li>
                        <li>
                            <a href="###" data-target="#tab3Content3" data-toggle="tab">图片水印配置</a></li>
                        <li>
                            <a href="###" data-target="#tab3Content4" data-toggle="tab">修改上传图片大小</a></li>
                        <li>
                            <a href="###" data-target="#tab3Content5" data-toggle="tab">限制最低上传图片长宽</a></li>
                        <li>
                            <a href="###" data-target="#tab3Content6" data-toggle="tab">其他设置</a></li>
                        <li>
                            <a href="###" data-target="#tab3Content7" data-toggle="tab">个人资料</a></li>
                    </ul>
                </div>
                <div class="col-xs-9">
                    <div class="tab-content col-xs-9">
                        <div class="tab-pane fade active in" id="tab3Content1">
                            <form>
                                <div class="form-group">
                                    <label>上传文件大小的最大值 默认2M 如需要更大上传请参考php.ini修改</label>
                                    <div class="input-group">
                                        <!--<span class="input-group-addon">￥</span>-->
                                        <input type="number" class="form-control" name="maxSize" value="2">
                                        <span class="input-group-addon">maxSize</span></div>
                                </div>
                                <div class="form-group">
                                    <label>图片存储文件夹 末尾需加 '/'</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="filePath" value="images/">
                                        <span class="input-group-addon">filePath</span></div>
                                </div>
                                <div class="form-group">
                                    <label>显示语言 中文繁体 'zh_TW' 美国英语 'en_US'默认为中文简体'zh_CN'</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="language" value="zh_CN">
                                        <span class="input-group-addon">language</span></div>
                                </div>
                                <div class="form-group">
                                    <label>png图像质量 介于1（快速但大文件）和9（慢速但较小的文件）之间 空为不压缩 默认7</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="png_zip" value="7">
                                        <span class="input-group-addon">png_zip</span></div>
                                </div>
                                <div class="form-group">
                                    <label>jpeg图像质量 介于1-100 数值越大质量越高 默认85</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="jpeg_zip" value="85">
                                        <span class="input-group-addon">jpeg_zip</span></div>
                                </div>
                                <div class="form-group">
                                    <label>是否开启水印 0关闭，1文字水印，2图片水印 gif不能添加水印</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="Watermark" value="0">
                                        <span class="input-group-addon">Watermark</span></div>
                                </div>
                                <div class="form-group">
                                    <label>水印位置 一个或两个的组合：T=top，B =bottom，L=left，R=right 默认TB</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="waterPositio" value="TB">
                                        <span class="input-group-addon">waterPositio</span></div>
                                </div>
                                <div class="form-group">
                                    <label>是否转换图片为指定格式:('png'|'jpeg'|'gif'|'bmp'|'')空则不转换</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="imgConvert" value="">
                                        <span class="input-group-addon">imgConvert</span></div>
                                </div>
                                <button type="submit" class="btn btn-primary">提交</button></form>
                        </div>
                        <div class="tab-pane fade" id="tab3Content2">
                            <form>
                                <div class="form-group">
                                    <label>指定文字水印</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="textWater" value="www.test.com">
                                        <span class="input-group-addon">textWater</span></div>
                                </div>
                                <div class="form-group">
                                    <label>文字方向 水平'h' 垂直'v'</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="textDirection" value="h">
                                        <span class="input-group-addon">textDirection</span></div>
                                </div>
                                <div class="form-group">
                                    <label>文字水印边距 px</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="textPadding" value="10">
                                        <span class="input-group-addon">textPadding</span></div>
                                </div>
                                <div class="form-group">
                                    <label>文字字体颜色 16色</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="textColor" value="#FF0000">
                                        <span class="input-group-addon">textColor</span></div>
                                </div>
                                <div class="form-group">
                                    <label>字体透明度 0-100</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="textOpacity" value="100">
                                        <span class="input-group-addon">textOpacity</span></div>
                                </div>
                                <div class="form-group">
                                    <label>字体路径相对路径</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="textFont" value="/common/in-app-ui.ttf">
                                        <span class="input-group-addon">textFont</span></div>
                                </div>
                                <div class="form-group">
                                    <label>字体大小</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="" value="32">
                                        <span class="input-group-addon">fontSize</span></div>
                                </div>
                                <div class="form-group">
                                    <label>背景色 边距textPadding有关 空则不显示背景颜色 16色</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="fontSize" value="32">
                                        <span class="input-group-addon">text_water_bg</span></div>
                                </div>
                                <div class="form-group">
                                    <label>背景色透明度 0-100</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="text_bg_opa" value="32">
                                        <span class="input-group-addon">text_bg_opa</span></div>
                                </div>
                                <button type="submit" class="btn btn-primary">提交</button></form>
                        </div>
                        <div class="tab-pane fade" id="tab3Content3">
                            <form>
                                <div class="form-group">
                                    <label>图片水印路径 支持GIF,JPG,BMP,PNG和PNG alpha</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="textWater" value="www.test.com">
                                        <span class="input-group-addon">textWater</span></div>
                                </div>
                                <div class="form-group">
                                    <label>指定文字水印</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="waterImg" value="/common/watermark.png">
                                        <span class="input-group-addon">waterImg</span></div>
                                </div>
                                <button type="submit" class="btn btn-primary">提交</button></form>
                        </div>
                        <div class="tab-pane fade" id="tab3Content4">
                            <form>
								<b>是否修改图片大小 开启true 关闭false 或''</b>
								<div class="input-group">
								  <select class="form-control"  name="image_resize">								  
									<option value="false">关闭修改</option>
									<option value="true">开启修改</option>
								  </select>								  
								</div>
								<br />
								<b>是否等比调整图片 开启true 关闭false 或''</b>
								<div class="input-group">
								  <select class="form-control"  name="image_ratio">								  
									<option value="false">关闭等比</option>
									<option value="true">开启等比</option>
								  </select>								  
								</div>
								
                                <div class="form-group">
                                    <label>调整后的图片宽度</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="image_x" value="250">
                                        <span class="input-group-addon">image_x</span></div>
                                </div>
                                <div class="form-group">
                                    <label>调整后的图片高度</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="image_y" value="250">
                                        <span class="input-group-addon">image_y</span></div>
                                </div>
                                <button type="submit" class="btn btn-primary">提交</button></form>
                        </div>
                        <div class="tab-pane fade" id="tab3Content5">
                            <form>
                                <div class="form-group">
                                    <label>上传图片的最小宽度 空为不限制''</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="image_min_w" value="">
                                        <span class="input-group-addon">image_min_w</span></div>
                                </div>
                                <div class="form-group">
                                    <label>上传图片的最小高度 空为不限制''</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="image_min_h" value="">
                                        <span class="input-group-addon">image_min_h</span></div>
                                </div>
                                <button type="submit" class="btn btn-primary">提交</button></form>
                        </div>
                        <div class="tab-pane fade" id="tab3Content6">
                            <form>
								<div class="input-group">
								  <select class="form-control"  name="static_cdn">
								  <label>开启CDN 开启true 关闭false</label>								  
									<option value="false">关闭CDN</option>
									<option value="true">开启CDN</option>
								  </select>								  
								</div>
								<br />
                                <button type="submit" class="btn btn-primary">提交</button>
							</form>
                        </div>
                        <div class="tab-pane fade" id="tab3Content7">
                            <form>
                                <div class="form-group">
                                    <label>旧密码</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="old_password" value="" placeholder="旧密码">
                                        <span class="input-group-addon">old_password</span></div>
                                    <label>新密码</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="old_password" value="" placeholder="新密码">
                                        <span class="input-group-addon">old_password</span></div>
                                </div>
                                <button type="submit" class="btn btn-primary">提交</button></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./static/jquery.min.js?v3.3.1"></script>
    <script src="./static/zui/js/zui.min.js?v1.8.1"></script>
    <script src="./static/qrcode.min.js"></script>
<?php include './footer.php';?>