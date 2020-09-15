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
		<h4>文章添加 :</h4>
	</div>
	<div class="form-body">
		<form action="/admin/article/store" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="exampleInputEmail1">文章标题</label>
				<input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="请输入文章名" value="{{old('title')}}">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">作者</label>
				<input type="text" class="form-control" name="auth" id="exampleInputEmail1" placeholder="请输入作者" value="{{old('auth')}}">
			</div>

			<div class="form-group">
				<label for="desc">描述</label>
				<textarea class="form-control" name="desc"></textarea>
			</div>

			<div class="form-group">
				<label for="tid">标签云</label>
				<br/>
				<select name="tid">
					<option value="">请选择</option>
					@foreach ($tagname_data as $k => $v)
					<option value="{{$v->id}}">{{$v->tagname}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="cid">所属栏目</label>
				<br/>
				<select name="cid">
					<option value="">请选择</option>
					@foreach ($cates_data as $k => $v)
						@if ($v->path != 0)
						<option value="{{$v->id}}">{{$v->cname}}</option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">缩略图</label>
				<input type="file" class="form-control" name="thumb">
			</div>

			<div class="form-group">
				<label for="content">文章内容</label>
				<!-- 加载编辑器的容器 -->
				<script id="container" name="content" type="text/plain"></script>
				<!-- 配置文件 -->
				<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
				<!-- 编辑器源码文件 -->
				<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
				<!-- 实例化编辑器 -->
				<script type="text/javascript">
				    var ue = UE.getEditor('container', {toolbars: [
										    ['fullscreen', 'source', 'undo', 'redo', 'bold']
										]});
				</script>
			</div>

			<input type="submit" class="btn btn-default" value="提交">
		</form> 
	</div>
</div>

@include('admin.public.footer')