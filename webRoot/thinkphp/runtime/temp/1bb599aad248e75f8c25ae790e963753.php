<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"F:\wampp\wwwRoot\thinkphp\public/../app/index\view\index\login.html";i:1541057203;s:57:"F:\wampp\wwwRoot\thinkphp\app\index\view\common\head.html";i:1540868718;s:57:"F:\wampp\wwwRoot\thinkphp\app\index\view\common\foot.html";i:1539824540;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>框架学习</title>
    <link rel="stylesheet" href="/thinkphp/public/static/css/bootstrap.css"/>
     <link rel="stylesheet" href="/thinkphp/public/static/js/layui/css/layui.css"/>
    <script type="text/javascript" src="/thinkphp/public/static/js/vue.min.js"></script>
    <script type="text/javascript" src="/thinkphp/public/static/js/layui/layui.all.js"></script>
    <script src="https://cdn.bootcss.com/vue-resource/1.5.1/vue-resource.min.js"></script>
</head>

<body>
<style>
    html, body, canvas {
        height: 100%;
        background-color: white;
    }

    a {
        cursor: pointer;
        text-decoration: none;
    }

    body {
        width: 100%;
        margin: 0;
        background-color: white;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    canvas {
        display: block;
        width: 100%;
        background: black;

    }

    .boxes {
        position: absolute;
        width: 350px;
        height: 350px;
        margin: auto;
        border: 1px solid #FFEDC5;
        color: white;
        animation: aninateA 1s 1;
    }

    h3 {
        text-align: center;
        width: 100%;
        margin-top: 45px;
    }

    form {
        width: 90%;
        margin: auto;
        color: white;
    }

    .boxRegestior {
        display: none;

    }

    .boxesOne {

        display: none;
    }

    .boxesTwo {
        display: block;
        position: absolute;
        width: 350px;
        height: 350px;
        margin: auto;
        border: 1px solid #FFEDC5;
        color: white;
        animation: aninate 1s 1;
    }

    @keyframes aninate {
        0% {
            transform: rotateY(0deg);

        }
        100% {
            transform: rotateY(360deg);

        }

    }

    @keyframes aninateA {
        0% {
            transform: rotateY(0deg);

        }
        100% {
            transform: rotateY(-360deg);

        }

    }
</style>


<div id="boxes" class="boxes">

    <h3>会员登录</h3>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">邮箱</label>
            <input type="email" class="form-control" id="userLogin" name="userLogin" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">密码</label>
            <input type="password" class="form-control" id="passLogin" name="passLogin" placeholder="Password">
        </div>

        <button type="button" class="btn btn-default" onclick="login()">登 录</button>

        <hr>
        没有账号？<a style="color: blue" onclick="regestor()">点击注册</a>
        <br>
        <a href="#" style="float: right" onclick='toQzoneLogin()'>
            <img src="/thinkphp/static/images/Connect_logo_2.png"></a>
    </form>

</div>
<div id="boxRegestior" class="boxRegestior">
    <h3>会员注册</h3>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">邮箱</label>
            <input type="email" class="form-control" id="regestorEmail" name="regestorEmail" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">密码</label>
            <input type="password" class="form-control" id="regestorPass" name="regestorPass" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-default" onclick="reges()">注 册</button>

        <hr>
        已经有账号？<a href="" style="color: blue" onclick="login()">点击登录</a>
        <br>
        <a href="#" style="float: right" onclick='toQzoneLogin()'>
            <img src="/thinkphp/static/images/Connect_logo_2.png"></a>
    </form>

</div>
<canvas></canvas>
<script type="text/javascript" src="/thinkphp/public/static/js/can.js"></script>
<script>

    var childWindow;

    function toQzoneLogin() {
        childWindow = window.open("qq/example/oauth/index.php", "TencentLogin", "width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
    }

    function closeChildWindow() {
        childWindow.close();
    }

    function regestor() {
        // var box=document.getElementById("boxes");
        // $box=$("#boxes");
        $("#boxes").addClass("boxesOne");
        $("#boxRegestior").removeClass("boxRegestior");
        $("#boxRegestior").addClass("boxesTwo");

    }

    //用户注册
    function reges() {
        var user = $("#regestorEmail").val(),
            pass = $("#regestorPass").val();
        if (user === "") {
            layer.alert("账号还没有填写哦", {skin: 'layui-layer-molv', icon: 3, anim: 4});
        }
        else if (pass === "") {
            layer.alert("你的密码还没有填写哦", {skin: 'layui-layer-molv', icon: 3, anim: 4});
        }
        else {
            $.ajax({
                type: 'post',
                cache: 'false',
                url: ' <?php echo url('/index.php/index/index/regestor'); ?>',
                data: {
                    "user": user,
                    "pass": pass,

                },
                dataType: "json",
                success:function (dat) {
                    layer.msg(dat.message);
                    if(dat.code==="200"){

                    }
                },error:function () {
                    layer.msg("登录失败！");
                }


            });

        }
    }

    //用户登录
    function login() {
        var user=$("#userLogin").val(),
            pass=$("#passLogin").val();
        if(user===""){
            layer.alert("你的账号没有填");
        }
        else if(pass===""){
            layer.alert("你的密码没有填");
        }
        else {
            $.ajax({
                type:'post',
                cache:'false',
                url: ' <?php echo url('/index/index/login'); ?>',
                data:{
                  "user":user,
                  "pass":pass,

                },
                dataType:"json",
                success:function (dat) {
                   layer.msg(dat.message);
                    if(dat.code===200){
                    window.location.href= '<?php echo url('/index/index/home'); ?>';
                    }
                    else {
                        return false;
                    }
                },
                error:function () {
                    layer.msg("登录失败");
                }




            })
        }

    }

</script>
</body>
<script type="text/javascript" src="/thinkphp/public/static/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/thinkphp/public/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/thinkphp/public/static/js/layui/layui.all.js"></script>
</html>