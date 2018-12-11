

var global_currentPage = 0; //定义全局变量，当前页面，初始值为1，初始在第一页
var global_unitA=-1;//定义全局的变量，初始单元，全部
var global_category = -1;//定义全局变量，查询数据类型，全部
var global_unit = -1;//定义全局变量，查询节数，单元，全部
var imgPath=config.imgPath;//图片路径地址


//点击搜索
$("#search").click(function () {
    window.location.href="search.html";

});
//上一页函数方法
function previousPage(totalPage) {
    global_currentPage = Number(global_currentPage);
    var currentPage = global_currentPage - 1;
    global_currentPage = currentPage;

    if (currentPage == "0") {
        $("#leftPage").children().remove();
    }
    $("#footer").children().remove();
    query();
    console.log("上一页" + global_unit, global_category + "当前第" + currentPage + "页" + "总共有" + totalPage);


}

//下一页函数方法
function nextPage(totalPage) {
    global_currentPage = Number(global_currentPage);
    var currentPage = global_currentPage + 1;
    global_currentPage = currentPage;
    console.log("下一页" + global_currentPage);
    if (currentPage == totalPage - 1) {
        $("#rightPage").children().remove();
    }
    $("#footer").children().remove();
    query();
    console.log("下一页" + global_unit, global_category + "当前第" + currentPage + "页" + "总共有" + totalPage);

}

//页面函数
function page(totalPage) {
    if (totalPage <= 1) {
        //如果总页数小于等于1，则不显示翻页按钮，不显示footer按钮

    }
    else {
        $pageButLeft = $("<i id=\"page\" class=\"icon iconfont \" onclick='previousPage(\"" + totalPage + "\")'>&#xe642;</i>");//显示上一页按钮
        $("#leftPage").html($pageButLeft);
        $pageButRight = $(" <i id=\"page\" class=\"icon iconfont\" onclick='nextPage(\"" + totalPage + "\")'>&#xe642;</i>");//显示下一页翻页按钮
        $("#rightPage").html($pageButRight);


        //总页数大于1，显示翻页按钮，显示footer按钮
        if (global_currentPage == 0) {

            $("#leftPage").children().remove();


        } else if (global_currentPage == totalPage - 1) {
            $("#rightPage").children().remove();


        }
        else if (1 <= global_currentPage < totalPage - 1) {

            $pageButLeft = $("<i id=\"page\" class=\"icon iconfont \" onclick='previousPage(\"" + totalPage + "\")'>&#xe642;</i>");//显示上一页按钮
            $("#leftPage").html($pageButLeft);
            $pageButRight = $(" <i id=\"page\" class=\"icon iconfont\" onclick='nextPage(\"" + totalPage + "\")'>&#xe642;</i>");//显示下一页翻页按钮
            $("#rightPage").html($pageButRight);
        }

        for ($p = 0; $p < $totalPage; $p++) {
            $page = "page" + $p;
            if ($p == global_currentPage) {
                $foot = $("<i id=\"" + $page + "\"  class=\"icon iconfont\" onclick='selectPage(\"" + $p + "\")' style=\"color:#A3AEDC\;font-size:32px;\">&#xe62f;</i>");
                $("#footer").append($foot);
            }

            else {
                $foot = $("<i id=\"" + $page + "\" class=\"icon iconfont\" onclick='selectPage(\"" + $p + "\")' style=\"color:#4B5377;font-size:24px;\">&#xe62f;</i>");
                $("#footer").append($foot);
            }

        }
    }


}
//选择第几页
function selectPage(page) {

    $("#footer").children().remove();
    global_currentPage = page;
    query();


}


//跳转链接
function jumpLink(url, id) {
    window.location.href = "show?id=" + id;

}