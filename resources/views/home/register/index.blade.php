<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.10.0/jquery.js"></script>
	<script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/login/layui-v2.5.6/layui/css/layui.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@if ($errors->any())
	<div class="alert alert-danger">
	    <ul>
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
@endif
	<form>
	  <div class="form-group">
	    <label for="exampleInputEmail1">用户名</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" name="uname" placeholder="请输入用户名">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">密码</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" name="upass" placeholder="请输入密码">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">确认密码</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" name="repass" placeholder="确认密码">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">验证码</label>
	    <br/>
	    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="验证码" name="code" style="width: 60%;display: inline;">
	    <img src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}'+Math.random()" alt="验证码">
	  </div>
	  <input type="submit" class="btn btn-success" value="提交">
	</form>
	<script src="/login/layui-v2.5.6/layui/layui.js"></script>
	<script src="/login/layui-v2.5.6/layui/layui.all.js"></script>
	<script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$('form:first').submit(function(){

			let uname = $('form input[name=uname]').val();
			let upass = $('form input[name=upass]').val();
			let repass = $('form input[name=repass]').val();
			let code = $('form input[name=code]').val();
			if (upass != repass) {
				layer.msg('两次密码不一致');
				return false;
			}

			$.post('/home/register/store', {uname,upass,code}, function(res){
				if (res.msg == 'OK') {
					layer.msg(res.info);
					setTimeout(function(){
						window.parent.location.reload();
						let index = parent.layer.getFrameIndex(window.name);
						parent.layer.close(index);
					}, 1000);
					
				} else {
					layer.msg(res.info);
				}
			}, 'json');

			return false;
		})
	</script>
</body>
</html>