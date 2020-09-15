@include('admin.public.header')
@if(session('success'))
<div>{{session('success')}}</div>
@endif
<div>轮播图列表</div>
<div class="panel-body widget-shadow">

	<div class="form-body">
		<div data-example-id="simple-form-inline">
			<form class="form-inline" action="/admin/banner" method="get">
				<div class="form-group">
					<label>轮播图名：</label>
					<input type="text" class="form-control" name="title" value="">
				</div>
				<button type="submit" class="btn btn-success">查询</button>
			</form>
		</div>
	</div>

	<h4>轮播图管理:</h4>
	<table class="table">
		<thead>
			<tr>
			  <th>ID</th>
			  <th>轮播图标题</th>
			  <th>轮播图描述</th>
			  <th>图片</th>
			  <th>状态</th>
			  <th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $k => $v)
			<tr>
			  <td>{{$v->id}}</td>
			  <td>{{$v->title}}</td>
			  <td>{{$v->desc}}</td>
			  <td><img width="90px" height="50px" src="/uploads/{{$v->url}}"></td>
			  <td>
			  @if ($v->status == 0)
			  <kdb>未激活</kdb>
			  @else
			  <kdb>已激活</kdb>
			  @endif
				</td>
			  <td>
			  	<a href="/admin/banner/edit" class="btn btn-info">修改</a>
			  	<a href="" class="btn btn-danger">删除</a>
			  	@if ($v->status == 0)
			  	<a class="btn btn-success" onclick="changeStatus({{$v->id}}, 0)">激活</a>
			  	@else
			  	<a class="btn btn-primary" onclick="changeStatus({{$v->id}}, 1)">停止</a>
			  	@endif
			  </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<!-- Button trigger modal -->
	<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	  Launch demo modal
	</button> -->

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body">
	        <form action="/admin/banner/changeStatus" method="get">
	        	<div class="form-group">
				<label for="exampleInputEmail1">轮播图状态</label>
				<br/>
				<span>未开启：</span>
				<input type="radio" name="status" value="0" checked>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<span>已开启：</span>
				<input type="radio" name="status" value="1">
				<input type="hidden" name="id" value="">
			</div>
			<input type="submit" class="btn btn-success" value="提交">
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
	<div>
		
	</div>
</div>
<script type="text/javascript">
	function changeStatus(id, number){
		$('#myModal form input[type=hidden]').eq(0).val(id);
		$('#myModal form input[type=radio]').eq(number).attr('checked', true);
		$('#myModal').modal('show');
	}
</script>
@include('admin.public.footer')