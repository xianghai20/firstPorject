var config = {

    imgPath: 'static/images/',//图片地址
    interface: {
        Domain: 'http://zheng.sharemysound.com/teacher/api/resource.api.php',//节数，类型接口地址
        library: 'http://zheng.sharemysound.com/teacher/api/resource.api.php',//教学库数据接口
        query: 'http://zheng.sharemysound.com/teacher/api/resource.api.php',//查询接口
        addCourse: 'http://zheng.sharemysound.com/teacher/api/course.api.php',//添加课件的接口
        courseList: 'http://zheng.sharemysound.com/teacher/api/course.api.php',// 获取课件列表
        getActive: 'http://zheng.sharemysound.com/teacher/api/course.api.php',//获取课件列表的接口地址
        delActive: 'http://zheng.sharemysound.com/teacher/api/course.api.php',//删除课件活动地址
        addActive: 'http://zheng.sharemysound.com/teacher/api/course.api.php',//添加课件活动接口地址
        userApi: 'http://zheng.sharemysound.com/teacher/api/user.api.php',//登录用户api


    },


};

//定义全局变量
var global_teachId = "";//
global_teachId = localStorage.getItem("tearchId");
var a = location.href;
var b = a.split("/");
var c = b.slice(b.length - 1, b.length).toString(String).split(".");
var test = c.slice(0, 1);


//
if (global_teachId == null && test != "myself") {
    alert("您还未登录哦！");
    window.location.href = "myself.html"
}


//定义点击的课件
var global_active = "";//储存活动id 的全局变量

//点击我的


$("#header_right").click(function () {
    window.location.href = "myself.html";
});





