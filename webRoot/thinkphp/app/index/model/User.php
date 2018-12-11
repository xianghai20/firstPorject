<?php


namespace app\index\model;

use  think\Db;

class User
{
    // 实例化模型用户的注册
    public function addUser($username, $pass, $addtime)
    {
        $data = ['user' => $username, 'pass' => $pass, 'addtime' => $addtime];
        $result = Db::table('think_user')->insert($data);
        return $result;

    }

   //对数据库的操作，用户的登录操作
    public function loginUser($user, $pass)
    {
        $data = ['user' => $user, 'pass' => $pass];
        $result = Db::table('think_user')->readMaster()->insert($data);
        return $result;

    }


}