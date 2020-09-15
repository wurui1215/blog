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
		<h4>标签云添加 :</h4>
	</div>
	<div class="form-body">
		<form action="/admin/tagname/store" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="exampleInputEmail1">标签云名</label>
				<input type="text" class="form-control" name="tagname" id="exampleInputEmail1" placeholder="请输入标签云名" value="{{old('tagname')}}">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">标签云颜色</label><br/>
				<input type="color" name="bgcolor" value="{{old('bgcolor')}}">
			</div>

			<input type="submit" class="btn btn-default" value="提交">
		</form> 
	</div>
</div>

@include('admin.public.footer')