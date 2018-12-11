<?php

namespace app\index\controller;

use app\index\model\User;
use think\Controller;
use think\Request;
use think\Config;


class Index extends Controller
{

    public function index()
    {
        //传递第一个参数，修改模板文件目录
        // 如果以./开头，那么要找到同级目录
       return view("index");

    }

    public function home()
    {
        return view("index");
    }
    public function test(){

        echo "这是(test)测试";

    }
    //英语四级成绩查询
    public function queryCet(){

        return view("queryCet");



    }

    //开始注册
    public function regestor()
    {

        $username = $_POST['user'];
        $pass = $_POST['pass'];
        $pass = md5($pass);
        $addtime = time();
        $User = new User();
        $data = $User->addUser($username, $pass, $addtime);
        if ($data) {
            $dat = array(
                "message" => "恭喜你，注册成功",
                "code" => 200,
                "data" => $data,

            );
            return json_encode($dat);
        } else {
            $dat = array(
                "message" => "注册失败",
                "code" => "404"

            );
            return json_encode($dat);

        }


    }

//开始登录
    public function login()
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $addtime = time();
        $pass = md5($pass);
        $UserDb = new User();
        $data = $UserDb->loginUser($user, $pass);

        if ($data) {
            session_start();
            $_SESSION['user'] = $user;
            $dat = array(
                "message" => "登录成功",
                "code" => 200,
            );
            echo json_encode($dat);
        } else {
            $dat = array(
                "message" => "登录失败",
                "code" => "404",
            );
            echo json_encode($dat);

        }

    }

    //退出登录或者注销
    public function clearSession()
    {


        session_start();
        session_destroy();
        $s = session_id();
        if (empty($s)) {
            return view('login');
        }

    }


}
