<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:57:"E:\xhweb\webRoot\thinkphp/app/index\view\index\index.html";i:1544491105;s:57:"E:\xhweb\webRoot\thinkphp\app\index\view\common\head.html";i:1544420563;s:57:"E:\xhweb\webRoot\thinkphp\app\index\view\common\foot.html";i:1544435560;}*/ ?>
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
    <style>
        html{
            width: 1920px;
            height: 1080px;
            zoom: 0.667;

        }
        body{
            width: 1920px;
            height: 1080px;
            border: 1px solid blue;
        }

    </style>

</head>

<body>
<link rel="stylesheet" type="text/css" href="/thinkphp/static/css/normalize.css"/>
<link rel="stylesheet" href="/thinkphp/static/css/style.css">
<style>
    #backGround {
        z-index: 0;

    }

    .main {
        width: 1920px;
        height: 1080px;

    }

    .cover {
        width: 1920px;
        height: 1080px;
        background-color: black;
        opacity: 0.1;
        margin-top: -1080px;
    }

    .boxes {
        width: 1900px;
        height: 1000px;
        margin-top: -1040px;
        margin-left: 10px;
        z-index: 9999;
        position: absolute;
    }

    .cardBox {
        width: 1200px;
        margin-top: 100px;
        margin-left: 350px;
        height: 800px;
    }

    .cardBox > div {
        width: 1200px;
        height: 100px;
        font-size: 32px;
        line-height: 100px;
    }

    .navTitle {
        width: 200px;
        text-align: center;
    }

    .inputBox {
        display: flex;
        flex-direction: row;
    }

    .navHeader {
        text-align: center;

    }

    input {
        background-color: transparent;
        /*border: 1px white dashed;*/
        border-right: hidden;
        width: 900px;
        border-top: hidden;
        border-left: hidden;

    }

    #message {
        height: 250px;
    }


</style>
<body>
<div class="main">

    <h3>这是index.html</h3>



</div>


</div>

</body>
<script type="text/javascript" src="/thinkphp/static/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/thinkphp/static/js/config.js"></script>
<script type="text/javascript" src="/thinkphp/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/thinkphp/static/js/layui/layui.all.js"></script>
</html>
<script>
    var api = config.interface.api;//api借楼地址

    //
    var query = new Vue({
        el: '#cardBox',
        data: {
            name: '向海',
            num: '',
            message:'',
            object:{
                val:"",
            }
        },
        methods: {
            check: function (event) {
                // `this` 在方法里指当前 Vue 实例
                if (this.name == "") {
                    alert("姓名不能为空");
                for($i=0;$i<10;$i++){
                 this.object={
                     val:$i,
                 }


                }



                }
                else {


                    console.log(this.name, this.num);

                    $.ajax({
                        type: "get",
                        cache: "false",
                        url: api,
                        data: {
                            "name": this.name,
                            "num": this.num,
                        },
                        dataType: "json",
                        success: function (res) {
                            console.log();





                        },
                        error: function (res) {
                            console.log("获取数据失败，请检查接口是否正确！");
                            $dat="紧张的一调考试结束了，当知道成绩时，我激动坏了。学习成绩并不是很好的我，这次一调考试居然冲进了班级前十，超越了成绩一直在我前面的一些同学。前十并不是那么容易就能进的，是通过不懈的努力而得来的。\n" +
                                "　　月考前一周，我与爸妈约定，这次考试一定要有所进步。在复习阶段，我找到了适合我自己的学习法宝。我把老师在课堂上讲的重要知识点用一个本子记录下来，下课与同学分析错题，并不断找老师加强基础知识的巩固。初三了，你必须要高效地、用心地去完成课下老师布置的作业。初三学习环境与之前也大不一样，每个同学都争先恐后的去找自己薄弱科目的老师进行辅导，老师总是会悉心的给我们一一解答。这样的一个月下来，我的成绩有了突飞猛进的进步。成绩的提高让我更有信心去面对最后的中考。\n" +
                                "　　我们要把每一次的考试当作中考去认真对待，尽自己最大的努力去争取每一分。每一节课要认真去听讲，做好笔记，下课后巩固课堂所学知识，解决自己困惑的知识点。一定要相信自己能够成功！\n" +
                                "　　让我们一起备战中考，向自己的目标前进，不畏惧，不放弃，加油！\n" +
                                "绳上的世界作文 有趣的吹鸡毛比赛作文 伟大的文化传承作文\n" +
                                "　　有趣的吹鸡毛比赛作文\n" +
                                "　　文/李一凡\n" +
                                "　　我玩过老鹰捉小鸡游戏，玩过躲猫猫游戏，可我从没玩过这么好的游戏。\n" +
                                "　　今天下午第六节课，我们班举行了一次有趣的游戏活动。\n" +
                                "　　是什么呢？那就是吹鸡毛比赛，游戏规则是这样的：我们分了两组，每组5人，2男3女，只要把鸡毛吹到敌军的阵地上就算赢，游戏是三局两胜。\n" +
                                "　　我们组有一个重量级人物许睿楠。大力士，他一上场，敌军就闻风丧胆，说：别让他上啊，他能把鸡毛吹飞了。这句话让我们班沸腾了。哄堂大笑，果不其然，在玩的过程中他把鸡毛吹到了黑板上面。\n" +
                                "　　算平局，接着又重来一次。鸡毛在两军阵地上空飘来飘去，难决雌雄，真紧张激烈。她们组眼看着把鸡毛吹到我们的阵地上了，可是由于一个队员过界了，只好乖乖投降。我们组那个高兴啊，大喊大叫。\n" +
                                "　　许睿楠一直在变幻莫测，左右开弓，威风凛凛的样子好像胜利一定属于我们。我对这个大个子真是刮目相看。他鼓起两腮用尽全力的吹，上气不接下气，脸红得像个鸡冠子。可是他依然坚守阵地，最后不用说我们赢得了比赛。\n" +
                                "　　我们真开心得很，玩也得有智慧呢。\n" +
                                "跳舞比赛作文 围棋比赛作文500字 广播体操比赛作文\n" +
                                "　　写人作文：我的双面人老师\n" +
                                "　　文/廖洪毅\n" +
                                "　　我有一位老师，她的头发不是很长，也不是特别短。她平常总是戴着一副眼镜，镜片后面藏着一双清澈明亮的大眼睛，笑起来的时候像弯弯的月牙，美丽极了！可她是一位情绪多变的老师。\n" +
                                "　　有一次她正在笑眯眯地给我们讲故事，忽然听到有同学在那里讲话，她皱起了眉毛，脸上的微笑也瞬间消失了，她狠狠地拍了一下桌子，把我们吓得魂飞魄散，接着很严肃地告诫我们：上课要认真听讲，要互相尊重。\n" +
                                "　　后来，一次偶然的机会让我看到了她温柔的一面。那天她刚进教室，看到有一个同学趴在桌子上很没精神的样子，于是就走过去低声温柔地询问：怎么了，不舒服吗？，她轻轻地摸了摸那位同学的额头，惊呼：呀 ，好烫，是发烧了。跟老师到办公室来，我先给你量量体温，倒点温开水喝。做完这些事以后，她立马跟那位同学的家长联系，让家长接他去看病。她还提醒我们，以后要是生病了不要硬撑着，要及时告诉她。\n" +
                                "　　时而正严厉色，时而温柔似春风、如流水，这就是我们的双面人老师！\n" +
                                "写人作文：我的妈妈 写人作文：我的爸爸 写人作文：刘无敌 \n" +
                                "编辑推荐：\n" +
                                "保安逆袭成高校辅导员：学习，是对人生最好的 \n" +
                                "... \n" +
                                "保安逆袭成高校辅导员：学习，是对人生最好的 \n" +
                                "保安逆袭成高校辅导员：学习，是对人生最好的投资 文/二次元猫小姐 1 曾因站着上北大经历闻名一时的保安甘相伟，最近亮相的身份是武汉传媒学院2016级辅导员。 从北大保安到北大学... \n" +
                                "保安逆袭成高校辅导员：学习，是对人生最好的 \n" +
                                "保安逆袭成高校辅导员：学习，是对人生最好的投资 文/二次元猫小姐 1 曾因站着上北大经历闻";

                               this.message=$dat;


                        },


                    })


                }


            },


        }


    });

</script>
</body>
</html>


