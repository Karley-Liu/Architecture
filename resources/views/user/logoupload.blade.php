<link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
<div class="form-group">
							<label>头像</label>
							<div class="layui-upload">
								<div class="layui-upload-list">
									<img class="layui-upload-img" id="demo1" style="width: 100px;height: 100px;" src="{{asset('')}}{{Session::get('user.logo')}}">
									<p id="demoText"></p>
								</div>
								<button type="button" class="layui-btn" id="test1" data-src="{$find.admin_logo}">上传图片</button>
							</div>
					</div>
<script src="{{asset('layui/layui.js')}}"></script>