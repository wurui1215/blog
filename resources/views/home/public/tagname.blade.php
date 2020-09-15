<div class="cloud">
  <h2 class="hometitle">标签云</h2>
  <ul>
    @foreach ($tagname_data as $k => $v)
    <a href="/home/list?tagname_id={{$v->id}}">{{$v->tagname}}</a>
    @endforeach
  </ul>
</div>