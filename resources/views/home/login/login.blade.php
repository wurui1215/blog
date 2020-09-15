
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="网站关键词">
    <meta name="Description" content="网站介绍">
    <link rel="stylesheet" href="/login/css/base.css">
    <link rel="stylesheet" href="/login/css/iconfont.css">
    <link rel="stylesheet" href="/login/css/reg.css">
    <link rel="stylesheet" href="/login/layui-v2.5.6/layui/css/layui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div id="ajax-hook"></div>
<div class="wrap">
    <div class="wpn">
        <div class="form-data pos">
            <a href=""><img src="/login/img/logo.png" class="head-logo"></a>
            <div class="form1">
                <p class="p-input pos">
                    <label for="num">用户名</label>
                    <input type="text" name="uname" id="num">
                    <span class="tel-warn num-err hide"><em>账号或密码错误，请重新输入</em><i class="icon-warn"></i></span>
                </p>
                <p class="p-input pos">
                    <label for="pass">请输入密码</label>
                    <input type="password" style="display:none"/>
                    <input type="password" name="upass" id="pass" autocomplete="new-password">
                    <span class="tel-warn pass-err hide"><em>账号或密码错误，请重新输入</em><i class="icon-warn"></i></span>
                </p>
                <p class="p-input pos code hide">
                    <label for="veri">请输入验证码</label>
                    <input type="text" id="veri">
                    <img src="">
                    <span class="tel-warn img-err hide"><em>账号或密码错误，请重新输入</em><i class="icon-warn"></i></span>
                    <!-- <a href="javascript:;">换一换</a> -->
                </p>
            </div>
<!--             <div class="form2 hide">
                <p class="p-input pos">
                    <label for="num2">手机号</label>
                    <input type="number" id="num2">
                    <span class="tel-warn num2-err hide"><em>账号或密码错误</em><i class="icon-warn"></i></span>
                </p>
                <p class="p-input pos">
                    <label for="veri-code">输入验证码</label>
                    <input type="number" id="veri-code">
                    <a href="javascript:;" class="send">发送验证码</a>
                    <span class="time hide"><em>120</em>s</span>
                    <span class="tel-warn error hide">验证码错误</span>
                </p>
            </div> -->
            <div class="r-forget cl">
                <a href="javascript:;" onclick="register()" class="z">账号注册</a>
                <a href="./getpass.html" class="y">忘记密码</a>
            </div>
            <button onclick="login()" class="lang-btn off log-btn">登录</button>
            <div class="third-party">
                <a href="#" class="log-qq icon-qq-round"></a>
                <a href="#" class="log-qq icon-weixin"></a>
                <a href="#" class="log-qq icon-sina1"></a>
            </div>
            <p class="right">Powered by © 2018</p>
        </div>
    </div>
</div>
<script src="/login/js/jquery.js"></script>
<script src="/login/js/agree.js"></script>
<!-- <script src="/login/js/login.js"></script> -->
<script src="/login/layui-v2.5.6/layui/layui.js"></script>
<script src="/login/layui-v2.5.6/layui/layui.all.js"></script>
<script type="text/javascript">
    function login(){
        let uname = $('.form1 input[name=uname]').eq(0).val();
        let upass = $('.form1 input[name=upass]').eq(0).val();
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post('/home/dologin', {uname,upass}, function(res){
            if (res.msg == 'OK') {
                layer.msg(res.info);
                window.location.href = '/';
            } else {
                //信息框-例3
                layer.msg(res.info);
            }
        }, 'json');
    }

    function register(){
        layer.open({
          type: 2,
          title: '注册',
          area: ['700px', '450px'],
          fixed: false, //不固定
          maxmin: true,
          content: '/home/register'
        });
    }
</script>
</body>
</html>
