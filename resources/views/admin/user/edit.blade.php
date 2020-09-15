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
		<h4>用户修改 :</h4>
	</div>
	<div class="form-body">
		<form action="/admin/user/update" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="exampleInputEmail1">用户名</label>
				<input type="text" class="form-control" name="uname" id="exampleInputEmail1" placeholder="请输入用户名" value="{{$data->uname}}">
			</div>
			<div class="form-group">
				<label for="email">修改邮箱</label>
				<input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="请输入邮箱" value="{{$data->email}}">
			</div>
			<div class="form-group">
				<label for="exampleInputFile">选择头像</label>
				<input type="file" name="profile" id="exampleInputFile">
				<img class="img-thumbnail" style="width: 60px;" src="/uploads/{{$data->profile}}">
			</div>
			<input type="hidden" name="id" value="{{$data->id}}">
			<input type="hidden" name="profile" value="{{$data->profile}}">
			<input type="submit" class="btn btn-default" value="修改">
		</form> 
	</div>
</div>

@include('admin.public.footer')