@include('admin.public.header')
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif
@if(session('error'))
<div>{{session('error')}}</div>
@endif
<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
	<div class="form-title">
		<h4>用户添加 :</h4>
	</div>
	<div class="form-body">
		<form action="/admin/user/store" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="exampleInputEmail1">用户名</label>
				<input type="text" class="form-control" name="uname" id="exampleInputEmail1" placeholder="请输入用户名" value="{{old('uname')}}">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">密码</label>
				<input type="password" class="form-control" name="upass" id="exampleInputPassword1" placeholder="请输入密码">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">确认密码</label>
				<input type="password" class="form-control" name="repass" id="exampleInputPassword1" placeholder="请输入密码">
			</div>
			<div class="form-group">
				<label for="exampleInputFile">选择头像</label>
				<input type="file" name="profile" id="exampleInputFile">
			</div>
			<input type="submit" class="btn btn-default" value="提交">
		</form> 
	</div>
</div>

@include('admin.public.footer')