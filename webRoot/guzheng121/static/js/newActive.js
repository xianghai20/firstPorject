var getActiveDomain = config.interface.getActive;//获取课件活动列表
var addActive = config.interface.addActive;//添加课件活动
var global_avtiveName = "";//定义活动名称的变量
var global_activeDescribe = "";//定义活动描述的变量
var currentStep = 1;
var domain = config.interface.Domain; //配置节数，类型域名接口地址
var global_chapterId = -1;//定义初始单元值，全部
var library = config.interface.library; //配置列表数据接口地址
var selectBox = new Array();//定义一个空数组，用来存储被选中的box
var delUrl = config.interface.delActive;//删除配置
var addCourse = config.interface.addActive;//j接口地址
//删除课件的操作
$("#delCourse").click(function () {
    $("#del_course").css({"display": "block"});
});
//确认删除课件的操作
$("#del_course_confirm").click(function () {
    $.ajax({
        type: "get",
        cache: "false",
        url: delUrl,
        data: {
            "action": "deleteCourse",
            "courseId": courseId,
            "teacherId": global_teachId,

        },
        dataType: 'json',
        success: function (res) {

            if (res.code == 0) {
                alert("删除成功！");
                window.location.href = "courseware.html";

            }
            else {
                alert(res.msg);
            }


        },
        error: function (res) {
            alert("删除失败！");
        },


    });
});
//取消删除课件选项
$("#del_course_close").click(function () {
    $("#del_course").css({"display": "none"});
    $("#boxes").css("opcity", "1");
});

//取消函数
$("#cancel").click(function () {
    $("#boxes").css({"opacity": "1"})
});

//下一步
$("#confirm").click(function () {

    var ActiveName = document.getElementById("course_name").value;
    var ActiveDescribe = document.getElementById("describe").value;
    //判断是否输入活动名称
    if (currentStep == 1 && ActiveName === "") {

        $("#messageOne").html("<i class=\"layui-icon\">&#xe702;</i> " + "温馨提示：名称不能为空哦！");
    }
    else if (currentStep == 2 && ActiveDescribe === "") {
        console.log(ActiveName);
        $("#messageTwo").html("<i class=\"layui-icon\">&#xe702;</i> " + "温馨提示：活动描述不能为空哦！");

    }
    else {
        global_avtiveName = ActiveName;
        global_activeDescribe = ActiveDescribe;
        console.log(global_avtiveName, global_activeDescribe);
        currentStep = Number(currentStep) + 1;
        console.log("您已经点击了下一步,当前第" + currentStep + "步");
        step(currentStep);

    }


});
//上一步
$("#pre_step").click(function () {
    currentStep = Number(currentStep) - 1;
    console.log("你点击了上一步，当前页面为第" + currentStep + "页");
    step(currentStep);

});

//弹窗页面的步骤函数
function step(currentPage) {
    //当页面为第一页的时候
    if (currentStep == 1) {

        console.log(currentStep);
        //显示第一步
        $("#page_one").css({"display": "block"});
        //隐藏第二步
        $("#page_two").css({"display": "none"});
        //当第一步的时候去掉上一步
        $("#pre_step").css("display", "none");
        $("#cancel").css({"margin-left": "180px"});
        $("#div_but").removeClass("div_but_three");


    }
    //当页面为第二页的时候
    else if (currentStep == 2) {
        console.log(currentStep);
        //显示上一步的按钮
        $("#confirm").html("下一步");
        $("#pre_step").css("display", "block");
        $("#cancel").css({"margin-left": "360px"});
        $("#pre_step").css("margin-left", "180px");
        $("#div_but").removeClass("div_but_three");
        $("#confirm").css({"width": "144px"});
        //显示第二步
        $("#page_two").css({"display": "block"});
        $("#page_one").css({"display": "none"});
        //隐藏第三步与第一步，显示第二步
        $("#page_three").css("display", "none");
        $("#myModal").removeClass("reveal-modal1");
        $("#myModal").addClass("reveal-modal");
    }
    //当前第三步
    else if (currentStep == 3) {
        console.log(currentStep);
        //按钮样式
        showTrack();
        // $("#confirm").html("选择单曲0首，确认");

        $("#div_but").addClass("div_but_three");
        $("#pre_step").css("margin-left", "400px");
        $("#cancel").css({"margin-left": "590px"});
        //确认按钮
        $("#confirm").css({"width": "360px"});
        //隐藏第一步与第二步的样式
        $("#page_one").css({"display": "none"});
        $("#page_two").css({"display": "none"});
        //显示第三步
        $("#page_three").css("display", "block");
        $("#myModal").removeClass("reveal-modal");
        $("#myModal").addClass("reveal-modal1");

        //清除类型与节数的子节点

        clearNode();
        //查询节数与类型
        nodeType();

        //确认添加


    }
    else if (currentPage == 4) {

        addActive1();

    }
    else {
        return false;
    }


}

//确定上传添加的活动
function addActive1() {

    $.ajax({
        type: "get",
        cache: "false",
        url: addCourse,
        data: {
            "action": "addModule",
            "teacherId": global_teachId,
            "courseId": courseId,
            "title": global_avtiveName,
            "desc": global_activeDescribe,
        },
        dataType: "json",
        success: function (res) {
            if (res.code == 0) {
                $moduleId = res.moduleId;
                addSong($moduleId);


            }


        },
        error: function (res) {
            layer.msg("添加失败！请稍后重试。");
        },


    });


}

//清除类型和节数的子节点，
function clearNode() {
    $("#jie_shu").children().remove();
    $("#lei_xin").children().remove();

    $leiXing = $("      <div id=\"title_node\" style=\"color:  #94A3E2;background-color: transparent\"\n" +
        "                 class=\"layui-btn layui-btn-primary layui-btn-radius\">类型\n" +
        "            </div>");
    $jieShu = $("     <div id=\"title_node\" style=\"color:  #94A3E2;background-color: transparent\"\n" +
        "                 class=\"layui-btn layui-btn-primary layui-btn-radius\">节数\n" +
        "            </div>");
    $("#jie_shu").append($jieShu);
    $("#lei_xin").append($leiXing);


}

//获取节数与类型
function nodeType() {
    console.log(global_unitA, global_unit, global_category);
    clearNode();
    $.ajax({
        type: 'get',
        cache: 'false',
        url: domain,
        data: {
            "action": "getFilterByChapter",
            "chapterId": global_unitA,

        },
        dataType: 'json',
        success: function (res) {
            //当访问成功，显示数据
            if (res.code === 0) {
                $dat = res.unit;
                $cat = res.category;
                $length = $dat.length;
                $typeL = $cat.length;
                $node = $("#jie_shu");

                //关于节数
                for ($i = 0; $i < $length; $i++) {
                    $name = $dat[$i].name; //名称
                    $title = $dat[$i].title; //标题
                    $unit = $dat[$i].unit; //节数
                    $unitName = "unit" + $unit;
                    $nodeIdName = "nodeName" + $unit; //名称id名称
                    $nodeIdTitle = "nodeTitle" + $unit; //标题id名称
                    if ($unit == -1) {

                        $li = $(" <div class=\"layui-btn layui-btn-primary layui-btn-radius\" style='background-color:#687DD5;color: white ' onclick= 'chapter(" + $unit + ")'  id=\"" + $unitName + "\">" +
                            "<div id=\"" + $nodeIdTitle + "\">" + $title + "</div>" +
                            "</div>");
                    }
                    else {
                        $li = $(" <div class=\"layui-btn layui-btn-primary layui-btn-radius\" onclick= 'chapter(" + $unit + ")'  id=\"" + $unitName + "\">" +
                            "<div id=\"" + $nodeIdTitle + "\">" + $title + "</div>" +
                            "</div>");
                    }


                    $("#jie_shu").append($li);

                    $footer = $(" <i class=\"icon iconfont\" style=\"color:#A3AEDC \">&#xe62f;</i>");

                }
                //关于类型
                for ($i = 0; $i < $typeL; $i++) {
                    $category = $cat[$i].category; //类型
                    $catName = $cat[$i].name; //类型名称
                    $categoryNmae = "category" + $category;

                    if ($category == -1) {

                        $type = $(" <div  style='background-color:#687DD5;color: white ' class=\"layui-btn layui-btn-primary layui-btn-radius\" onclick='showCategory(" + $category + ")' id=\"" + $categoryNmae + "\" >" + $catName + "</div>");

                    }
                    else {
                        $type = $(" <div  class=\"layui-btn layui-btn-primary layui-btn-radius\" onclick='showCategory(" + $category + ")' id=\"" + $categoryNmae + "\" >" + $catName + "</div>");

                    }

                    $("#lei_xin").append($type);

                }

            }

        },
        error: function (res) {
            console.log(res);
        }

    });    //查询节数和类型
}

//查询曲目单元
function unit(unit) {
    console.log("点击单元的操作此时的单元为" + unit + "单元；" + "节数为" + global_unit + "节" + "类型为" + global_category);
    if (global_unitA != unit) {
        global_currentPage=0;
        $("#unitA" + global_unitA).css({"background": "#455BB6", "color": "#8799E9"});
        $("#unitA" + unit).css({"background-color": "#687DD5", "color": "white"});
        $("#unit" + global_unit).css({"background": "#687DD5", "color": "white"});
        $("#category" + global_category).css({"background-color": "#687DD5", "color": "white"});
        global_unitA = unit;
        global_category = -1;
        global_unit = -1;
    }

    nodeType();
    query();
}

//查询曲目节数
function chapter(node) {
    console.log("点击单元的操作此时的单元为" + global_unitA + "单元；" + "节数为" + node + "节" + "类型为" + global_category);
    if (global_unit != node) {
        global_currentPage=0;
        $("#unitA" + global_unitA).css({"background-color": "#687DD5", "color": "white"});
        $("#unit" + global_unit).css({"background": "#455BB6", "color": "#8799E9"});
        $("#unit" + node).css({"background-color": "#687DD5", "color": "white"});
        $("#category" + global_category).css({"background-color": "#687DD5", "color": "white"});
        global_unit = node;
    }
    query();
}

//查询曲目类型
function showCategory(category) {
    if (global_category !== category) {
        global_currentPage=0;
        console.log("点击单元的操作此时的单元为" + global_unitA + "单元；" + "节数为" + global_unit + "节" + "类型为" + category);
        $("#unitA" + global_unitA).css({"background-color": "#687DD5", "color": "white"});
        $("#unit" + global_unit).css({"background": "#687DD5", "color": "white"});
        $("#category" + global_category).css({"background": "#455BB6", "color": "#8799E9"});
        $("#category" + category).css({"background-color": "#687DD5", "color": "white"});
        global_category = category;
    }
    query();
}

//查询数据，曲目
function query() {
    $("#result_box").children().remove();
    $("#footer").children().remove();
    //查询教学库数据
    $.ajax({
        type: 'get',
        cache: 'false',
        url: library,
        data: {
            action: 'getResourceByFilter',
            chapterId: global_unitA,
            unit: global_unit,
            category: global_category,
            page: global_currentPage,
            pageSize: 6,

        },
        dataType: 'json',
        beforeSend: function () {
            $("#load").css("display", "block");
            $("#leftPage").children().remove();
            $("#rightPage").children().remove();
        },
        success: function (res) {
            if (res.code === 0) {
                $("#load").css("display", "none");
                $totalPage = res.totalPage; //总页
                $dat = res.resource;
                $resLength = $dat.length;
                page($totalPage);


                if ($resLength === 0) {
                    $("#load").css("display", "block");
                    $("#load").html("捕获到0条记录！");


                } else {

                    $("#content_box1").children().remove();
                    $("#content_box2").children().remove();

                    for ($i = 0; $i < $resLength; $i++) {

                        $id = $dat[$i].id;
                        $chapter = $dat[$i].chapter;
                        $code = $dat[$i].code;
                        $unit = $dat[$i].unit;
                        $category = $dat[$i].category;
                        $name = $dat[$i].name;
                        $type = $dat[$i].type;
                        $selectId = "selectImg" + $id;
                        if ($type === "1") {
                            $imgurl = imgPath + "icon-mp4.png";

                        }
                        else if ($type === "2") {
                            $imgurl = imgPath + "music_1.png";

                        }
                        else if ($type === "3") {
                            $imgurl = imgPath + "icon_img.png";
                        }

                        if($code==null){
                            $code="";

                        }


                        $li = $("   <div class=\"box\" onclick='selectBoxes(\"" + $id + "\")'>\n" +
                            "                    <div class=\"item_box\">\n" +
                            "                        <img id=\"" + $selectId + "\"  class=\"select\"\n" +
                            "                             style=\"width: 80px;height: 80px;position: absolute;margin-left: 130px;margin-top: 0px\"\n" +
                            "                             src=\"static/images/check-circle.png\"/>\n" +
                            "                        <img src=\"" + $imgurl + "\"/>\n" +
                            "                        <div class=\"total_title\">" + $code + "</div>\n" +
                            "\n" +
                            "                    </div>\n" +
                            "                    <div class=\"item_title\">" + $name + "</div>\n" +
                            "                </div>");

                        $("#result_box").append($li);


                    }
                    selectItemBox();
                }

            }

        },
        error: function (res) {
            console.log(res);
            $("#load").html("数据请求出现异常啦");
        }
    });

}

//显示已经选中的box
function selectItemBox() {
    $length = selectBox.length;
    for ($i = 0; $i < $length; $i++) {
        $boxId = selectBox[$i];
        $("#selectImg" + $boxId).css({"display": "block"});
    }


}

//获取课件活动的列表数据
console.log(global_teachId);


//在选中box曲目的函数
var selec = 1;
var global_id = "";

//显示已经选中的曲目函数
function showTrack() {
    $count = selectBox.length;//获取曲目的数量
    $("#confirm").html("选择单曲" + $count + "首，确认");
    $("#confirm").css({"color": "#5361FC", "background": "#FFFFFF"});


}

function selectBoxes(id) {

    var val = $.inArray(id, selectBox);
    if (val >= 0) {
        $weiZhi = selectBox.indexOf(id);
        console.log("位置" + $weiZhi);
        selectBox.splice($weiZhi, 1);//将取消选中的box从数组中删除
        $("#selectImg" + id).css({"display": "none"});
        console.log("删除这个" + id, "此时的数组为" + selectBox);
        showTrack();

    }
    else {
        $("#selectImg" + id).css({"display": "block"});
        selectBox.push(id);//将选中的box存储到selectBOx的数组中
        console.log("存储这个" + id, "此时的数组为" + selectBox);
        showTrack();
    }


}

//添加曲目
function addSong(moduleId) {
    var box = JSON.stringify(selectBox);
    $.ajax({
        type: "get",
        cache: "false",
        url: addCourse,
        data: {
            "action": "updateResourceByModule",
            "resourceIds": box,
            "moduleId": moduleId,
            "teacherId": global_teachId,

        },
        dataType: "json",
        success: function (res) {

            if (res.code == 0) {
                alert("添加成功");
                window.location.reload();
            }
            else {
                alert(res.msg);
            }

        },
        error: function (res) {
            alert("操作失败！");
            location.reload();
        },

    });


}
