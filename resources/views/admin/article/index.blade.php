@include('admin.public.header')
@if(session('success'))
<div>{{session('success')}}</div>
@endif
<div>文章列表</div>
<div class="panel-body widget-shadow">

	<div class="form-body">
		<div data-example-id="simple-form-inline">
			<form class="form-inline" action="/admin/cates" method="get">
				<div class="form-group">
					<label>文章名：</label>
					<input type="text" class="form-control" name="cname" value="">
				</div>
				<button type="submit" class="btn btn-success">查询</button>
			</form>
		</div>
	</div>

	<h4>文章管理:</h4>
	<table class="table">
		<thead>
			<tr>
			  <th>ID</th>
			  <th>标题</th>
			  <th>作者</th>
			  <th>描述</th>
			  <th>创建时间</th>
			  <th>缩略图</th>
			  <th>浏览量</th>
			  <th>点赞量</th>
			  <th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k => $v)
			<tr>
			  <td>{{$v->id}}</td>
			  <td>
			  	<p title="{{$v->title}}" style="width:100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$v->title}}</p>
			  </td>
			  <td>{{$v->auth}}</td>
		  	  <td>
		  		<p title="{{$v->desc}}" style="width:100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$v->desc}}</p>
		  	  </td>
			  <td>{{$v->ctime}}</td>
			  <td>
			  	<img class="img-thumbnail" style="width: 50px;height: 90px;" src="/uploads/{{$v->thumb}}">
			  </td>
			  <td>{{$v->num}}</td>
			  <td>{{$v->goodnum}}</td>
			  <td>
			  	<a href="" class="btn btn-danger">删除</a>
			  	<a href="" class="btn btn-primary">修改</a>
			  	<a href="javascript:;" class="btn btn-info" onclick="shows('{{$v->title}}','{{$v->content}}')">查看文章内容</a>
			  </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body">
	      </div>
	    </div>
	  </div>
	</div>

	<div>
		
	</div>
</div>
<script type="text/javascript">
	function shows(titles,contents){
		let title = titles;
		let content = contents;
		$('#myModal .modal-title').html(title);
		$('#myModal .modal-body').html(content);
		$('#myModal').modal('show');
	}
</script>
@include('admin.public.footer')