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
		<h4>轮播图添加 :</h4>
	</div>
	<div class="form-body">
		<form action="/admin/banner/store" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="exampleInputEmail1">轮播图标题</label>
				<input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="请输入轮播图名" value="{{old('title')}}">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">轮播图描述</label>
				<input type="text" class="form-control" name="desc" id="exampleInputEmail1" placeholder="请输入轮播图描述" value="{{old('desc')}}">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">轮播图URL</label>
				<input type="file" class="form-control" name="url">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">轮播图状态</label>
				<br/>
				<span>未开启：</span>
				<input type="radio" name="status" value="0">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<span>已开启：</span>
				<input type="radio" name="status" value="1">
			</div>

			<input type="submit" class="btn btn-default" value="提交">
		</form> 
	</div>
</div>

@include('admin.public.footer')