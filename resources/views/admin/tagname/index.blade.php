`@include('admin.public.header')
@if(session('success'))
<div>{{session('success')}}</div>
@endif
<div>标签云列表</div>
<div class="panel-body widget-shadow">

	<div class="form-body">
		<div data-example-id="simple-form-inline">
			<form class="form-inline" action="/admin/cates" method="get">
				<div class="form-group">
					<label>标签云名：</label>
					<input type="text" class="form-control" name="cname" value="">
				</div>
				<button type="submit" class="btn btn-success">查询</button>
			</form>
		</div>
	</div>

	<h4>标签云管理:</h4>
	<table class="table">
		<thead>
			<tr>
			  <th>ID</th>
			  <th>标签云名</th>
			  <th>标签云颜色</th>
			  <th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k => $v)
			<tr>
			  <td>{{$v->id}}</td>
			  <td>{{$v->tagname}}</td>
			  <td>
			  	<kbd style="background-color: {{$v->bgcolor}};">&nbsp;&nbsp;&nbsp;&nbsp;</kbd>
			  </td>
			  <td>
			  	<a class="btn btn-info">修改</a>
			  	<a class="btn btn-danger">删除</a>
			  </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div>
		
	</div>
</div>
@include('admin.public.footer')