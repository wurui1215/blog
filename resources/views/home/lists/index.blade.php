
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>blog</title>
<meta name="keywords" content="个人博客,杨青个人博客,个人博客模板,杨青" />
<meta name="description" content="杨青个人博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/home/css/base.css" rel="stylesheet">
<link href="/home/css/index.css" rel="stylesheet">
<link href="/home/css/m.css" rel="stylesheet">
<script src="/home/js/jquery.min.js" type="text/javascript"></script>
<script src="/home/js/jquery.easyfader.min.js"></script>
<script src="/home/js/scrollReveal.js"></script>
<script src="/home/js/common.js"></script>
<!--[if lt IE 9]>
<script src="/home/js/modernizr.js"></script>
<![endif]-->
</head>
<body>

@include('home.public.header');

<div class="pagebg sh"></div>
<div class="container">
  <h1 class="t_nav"><span>不要轻易放弃。学习成长的路上，我们长路漫漫，只因学无止境。 </span><a href="/" class="n1">网站首页</a><a href="/" class="n2">学无止境</a></h1>
  <!--blogsbox begin-->
  <div class="blogsbox">
    @foreach ($cates_lists as $k => $v)
    <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
      <h3 class="blogtitle"><a href="/home/detail?id={{$v->id}}&cid={{$v->cid}}&tagname_id={{$v->tid}}" target="_blank">{{$v->title}}!</a></h3>
      <span class="blogpic"><a href="/home/detail?id={{$v->id}}&cid={{$v->cid}}&tagname_id={{$v->tid}}" title=""><img src="/uploads/{{$v->thumb}}" alt=""></a></span>
      <p class="blogtext">{{$v->desc}}</p>
      <div class="bloginfo">
        <ul>
          <li class="author"><a href="/">{{$v->auth}}</a></li>
          @foreach ($cname as $i => $j)
              @if ($j->id == $v->cid)
              <li class="lmname"><a href="/">{{$j->cname}}</a></li>
              @endif
          @endforeach
          <li class="timer">{{$v->ctime}}</li>
          <li class="view"><span>{{$v->num}}</span>已阅读</li>
          <li class="like">{{$v->goodnum}}</li>
        </ul>
      </div>
    </div>
    @endforeach
    
    <div class="pagelist"><a title="Total record">&nbsp;<b>45</b> </a>&nbsp;&nbsp;&nbsp;<b>1</b>&nbsp;<a href="/download/index_2.html">2</a>&nbsp;<a href="/download/index_2.html">下一页</a>&nbsp;<a href="/download/index_2.html">尾页</a></div>
    
  </div>
  <!--blogsbox end-->
  <div class="sidebar">
    <div class="zhuanti">
      <h2 class="hometitle">特别推荐</h2>
      <ul>
        <li> <i><img src="/home/images/banner03.jpg"></i>
          <p>帝国cms调用方法 <span><a href="/">阅读</a></span> </p>
        </li>
        <li> <i><img src="/home/images/b04.jpg"></i>
          <p>5.20 我想对你说 <span><a href="/">阅读</a></span></p>
        </li>
        <li> <i><img src="/home/images/b05.jpg"></i>
          <p>个人博客，属于我的小世界！ <span><a href="/">阅读</a></span></p>
        </li>
      </ul>
    </div>
    <div class="tuijian">
      <h2 class="hometitle">推荐文章</h2>
      <ul class="tjpic">
        <i><img src="/home/images/toppic01.jpg"></i>
        <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
      </ul>
      <ul class="sidenews">
        <li> <i><img src="/home/images/toppic01.jpg"></i>
          <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
          <span>2018-05-13</span> </li>
        <li> <i><img src="/home/images/toppic02.jpg"></i>
          <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
          <span>2018-05-13</span> </li>
        <li> <i><img src="/home/images/v1.jpg"></i>
          <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
          <span>2018-05-13</span> </li>
        <li> <i><img src="/home/images/v2.jpg"></i>
          <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
          <span>2018-05-13</span> </li>
      </ul>
    </div>
    <div class="tuijian">
      <h2 class="hometitle">点击排行</h2>
      <ul class="tjpic">
        <i><img src="/home/images/toppic01.jpg"></i>
        <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
      </ul>
      <ul class="sidenews">
        <li> <i><img src="/home/images/toppic01.jpg"></i>
          <p><a href="/">别让这些闹心的套路</a></p>
          <span>2018-05-13</span> </li>
        <li> <i><img src="/home/images/toppic02.jpg"></i>
          <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
          <span>2018-05-13</span> </li>
        <li> <i><img src="/home/images/v1.jpg"></i>
          <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
          <span>2018-05-13</span> </li>
        <li> <i><img src="/home/images/v2.jpg"></i>
          <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
          <span>2018-05-13</span> </li>
      </ul>
    </div>

    @include('home.public.tagname');
    
  </div>
</div>
<footer>
  <p>Design by <a href="http://www.yangqq.com" target="_blank">杨青个人博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
