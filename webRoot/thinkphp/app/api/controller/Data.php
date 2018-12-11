<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/12/1
 * Time: 16:24
 */


namespace app\api\controller;

use app\api\model\dataModel;
use think\Controller;


class data extends Controller
{
    public function index()
    {

        include('simple_html_dom.php');
        $zkzh = $_GET['num'];
        $xm = $_GET['name'];//$zkzh = '4300221312*****';//准考证号//$xm = '**';//姓名
        $curlPost='zkzh='.$zkzh.'&xm='.$xm;$ch = curl_init("http://www.chsi.com.cn/cet/query?".$curlPost) ;
        $arrMsg = array();for($i=0;$i<15;$i++){    curl_setopt($ch, CURLOPT_REFERER, "http://www.chsi.com.cn/cet/ ");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $output = curl_exec($ch) ;      $html = new simple_html_dom();
        $html ->load($output);        foreach($html->find("td") as $m)
        {            array_push($arrMsg,$m->plaintext);     }
        $returnArr= array("name"=>urlencode($arrMsg[2]),"school"=>urlencode($arrMsg[3]),
            "time"=>urlencode($arrMsg[6]),"pro"=>urlencode($arrMsg[4]),"score"=>urlencode($arrMsg[7]));
        if(!empty($arrMsg))    {        echo urldecode(json_encode($returnArr));        break;    }    }


    }

    public function test1()
    {
        echo "这是第二次测试";
    }
}





