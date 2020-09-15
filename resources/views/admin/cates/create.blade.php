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
		<h4>栏目添加 :</h4>
	</div>
	<div class="form-body">
		<form action="/admin/cates/store" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="exampleInputEmail1">栏目名</label>
				<input type="text" class="form-control" name="cname" id="exampleInputEmail1" placeholder="请输入栏目名" value="{{old('cname')}}">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">所属栏目</label>
				<select name="pid" class="form-control">
					<option value="0">--请选择--</option>
					@foreach ($data as $k => $v)
					<option {{$id == $v->id ? 'selected' : ''}} value="{{$v->id}}">{{$v->cname}}</option>
					@endforeach
				</select>
			</div>
			<input type="submit" class="btn btn-default" value="提交">
		</form> 
	</div>
</div>

@include('admin.public.footer')