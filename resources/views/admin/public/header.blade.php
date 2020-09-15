<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="/admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="/admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="/admin/js/jquery-1.11.1.min.js"></script>
<script src="/admin/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="/admin/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="/admin/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="/admin/js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="/admin/css/clndr.css" type="text/css" />
<script src="/admin/js/underscore-min.js" type="text/javascript"></script>
<script src= "/admin/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="/admin/js/clndr.js" type="text/javascript"></script>
<script src="/admin/js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="/admin/js/metisMenu.min.js"></script>
<script src="/admin/js/custom.js"></script>
<link href="/admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
						<li>
							<a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;</i>用户管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/user">用户列表</a>
								</li>
								<li>
									<a href="/admin/user/create">用户添加</a>
								</li>
							</ul>
							<!-- //nav-second-level -->
						</li>

						<li>
							<a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;</i>栏目管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/cates">栏目列表</a>
								</li>
								<li>
									<a href="/admin/cates/create">栏目添加</a>
								</li>
							</ul>
							<!-- //nav-second-level -->
						</li>

						<li>
							<a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;</i>轮班图管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/banner">轮播图列表</a>
								</li>
								<li>
									<a href="/admin/banner/create">轮播图添加</a>
								</li>
							</ul>
							<!-- //nav-second-level -->
						</li>

						<li>
							<a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;</i>标签云管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/tagname">标签云列表</a>
								</li>
								<li>
									<a href="/admin/tagname/create">标签云添加</a>
								</li>
							</ul>
							<!-- //nav-second-level -->
						</li>

						<li>
							<a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;</i>文章管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/article">文章列表</a>
								</li>
								<li>
									<a href="/admin/article/create">文章添加</a>
								</li>
							</ul>
							<!-- //nav-second-level -->
						</li>
					</ul>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="index.html">
						<h1>NOVUS</h1>
						<span>AdminPanel</span>
					</a>
				</div>
				<!--//logo-->
				<!--search-box-->
				<div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div><!--//end-search-box-->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">

				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img style="width: 50px; height: 50px;border-radius: 50%;" src="/uploads/{{session('admin_userinfo')->profile}}" alt=""> </span> 
									<div class="user-name">
										<p>{{session('admin_userinfo')->uname}}</p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i> 个人信息</a> </li> 
								<li> <a href="#"><i class="fa fa-user"></i> 头像</a> </li> 
								<li> <a href="/admin/logout"><i class="fa fa-sign-out"></i> 退出</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >手机网站模板</a></div>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="row calender widget-shadow" style="display: none">
					<h4 class="title">Calender</h4>
					<div class="cal1">
					</div>
				</div>