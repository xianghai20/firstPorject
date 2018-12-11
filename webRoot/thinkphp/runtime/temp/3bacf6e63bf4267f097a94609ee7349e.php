<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"F:\wampp\wwwRoot\thinkphp/app/index\view\index\index.html";i:1541055563;s:57:"F:\wampp\wwwRoot\thinkphp\app\index\view\common\head.html";i:1540868718;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>框架学习</title>
    <link rel="stylesheet" href="/thinkphp/static/css/bootstrap.css"/>
     <link rel="stylesheet" href="/thinkphp/static/js/layui/css/layui.css"/>
    <script type="text/javascript" src="/thinkphp/static/js/vue.min.js"></script>
    <script type="text/javascript" src="/thinkphp/static/js/layui/layui.all.js"></script>
    <script src="https://cdn.bootcss.com/vue-resource/1.5.1/vue-resource.min.js"></script>
</head>

<body>

<style>
    iframe {
        z-index: -999;
        position: fixed;
    }
</style>
<body>
<div id="login"></div>
<!--<div id="app">-->
<!--<ol>-->
<!--<li v-for="site in sites">-->
<!--{{ site.name }}-->
<!--</li>-->
<!--</ol>-->
<!--</div>-->

<button type="button" onclick="clearSession()">退出</button>

<script type="text/javascript" src="/thinkphp/static/js/jquery-3.3.1.min.js"></script>
<script>
    // new Vue({
    //     el: '#app',
    //     data: {
    //         message: 44,
    //     },
    //     methods: {
    //         get:function(){
    //             $.ajax({
    //                 type:'post',
    //                 cache:'false',
    //                 data:{
    //                     action:'getNews',
    //                 },
    //                 url:'http://yamaha.musicedu123.com/match/api/news.php',
    //                 dataType:'json',
    //                 success:function (res) {
    //                     console.log("res");
    //
    //                 },
    //                 error:function () {
    //                     console.log("错误")
    //                 }
    //
    //
    //
    //
    //
    //             })
    //         }
    //
    //     }
    //
    // })
    // Vue.http.post('http://yamaha.musicedu123.com/match/api/news.php', {action: "getNews"}, {emulateJSON: true}).then(function (res) {
    //         $dat = res.body.newsList;
    //         for ($i = 0; $i < $dat.length; $i++) {
    //             $news = $dat[$i].title;
    //             $li=$("<li>"+$i+"、"+$news+"</li>");
    //             $("#news").append($li);
    //         }
    //         new Vue({
    //             el: '#box',
    //             data: {
    //                 message: $news,
    //             }
    //         });
    //     console.log($news);
    //     },
    //     function (res) {
    //         console.log("请求失败");
    //     });

    // window.onload = function(){
    //     var vm = new Vue({
    //         el:'#box',
    //         data:{
    //             message:"sadaasaas",
    //         },
    //         methods:{
    //             post:function(){
    //                 //发送 post 请求
    //                 this.$http.post('http://yamaha.musicedu123.com/match/api/news.php',{action:"getNews"},{emulateJSON:true}).then(function(res){
    //                     $dat=res.body.newsList.length;
    //                    console.log($dat);
    //
    //                 },function(res){
    //                     console.log(res.status);
    //                 });
    //             }
    //         }
    //     });
    // }

    function clearSession() {
        window.location.href= '<?php echo url('/index/index/clearSession'); ?>';

    }
</script>
</body>
</html>


