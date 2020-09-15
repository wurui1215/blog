@include('admin.public.header')
@if(session('success'))
<div>{{session('success')}}</div>
@endif
<div>用户列表</div>
<div class="panel-body widget-shadow">

	<div class="form-body">
		<div data-example-id="simple-form-inline">
			<form class="form-inline" action="/admin/user" method="get">
				<div class="form-group">
					<label>用户名：</label>
					<input type="text" class="form-control" name="uname" value="{{$uname}}">
				</div>
				<button type="submit" class="btn btn-success">查询</button>
			</form>
		</div>
	</div>

	<h4>用户管理:</h4>
	<table class="table">
		<thead>
			<tr>
			  <th>ID</th>
			  <th>用户名</th>
			  <th>头像</th>
			  <th>状态</th>
			  <th>注册时间</th>
			  <th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k => $v)
			<tr>
			  <td>{{$v->id}}</td>
			  <td>{{$v->uname}}</td>
			  <td>
			  	<img class="img-thumbnail" style="width: 60px;" src="/uploads/{{$v->profile}}">
			  </td>
			  @if ($v->status == 0)
			  <td>未激活</td>
			  @else
			  <td>激活</td>
			  @endif
			  <td>{{$v->created_at}}</td>
			  <td>
			  	<a class="btn btn-info" href="/admin/user/edit?id={{$v->id}}&token={{$v->token}}">修改</a>
			  	<a class="btn btn-danger" onclick="del('{{$v->id}}',this,'{{$v->token}}')">删除</a>
			  </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div>
		{{$data->appends(['uname' => $uname])->links()}}
	</div>
</div>
<script type="text/javascript">
	function del(id, obj, token) {
		if (!window.confirm('确定要删除吗？')) {
			return false;
		}

		$.get('/admin/user/destroy', {id:id,token:token}, function(res) {
			if (res == 'OK') {
				$(obj).parent().parent().remove();
			} else {
				alert('删除失败');
			}
		}, 'html');
	}
</script>

@include('admin.public.footer')