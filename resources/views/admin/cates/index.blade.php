@include('admin.public.header')
@if(session('success'))
<div>{{session('success')}}</div>
@endif
<div>栏目列表</div>
<div class="panel-body widget-shadow">

	<div class="form-body">
		<div data-example-id="simple-form-inline">
			<form class="form-inline" action="/admin/cates" method="get">
				<div class="form-group">
					<label>栏目名：</label>
					<input type="text" class="form-control" name="cname" value="">
				</div>
				<button type="submit" class="btn btn-success">查询</button>
			</form>
		</div>
	</div>

	<h4>栏目管理:</h4>
	<table class="table">
		<thead>
			<tr>
			  <th>ID</th>
			  <th>栏目名</th>
			  <th>父级ID</th>
			  <th>栏目路径</th>
			  <th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k => $v)
			<tr>
			  <td>{{$v->id}}</td>
			  <td>{{$v->cname}}</td>
			  <td>{{$v->pid}}</td>
			  <td>{{$v->path}}</td>
			  <td>
			  	@if ($v->pid == 0)
			  	<a class="btn btn-info" href="/admin/cates/create?id={{$v->id}}">添加子栏目</a>
			  	@endif
			  </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div>
		
	</div>
</div>
@include('admin.public.footer')