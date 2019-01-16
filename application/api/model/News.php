<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2019/1/16
 * Time: 4:51 PM
 */
namespace app\api\model;
use \think\Model;

Class News extends Model
{
//    //自定义初始化
//    protected function initialize()
//    {
//        //需要调用`Model`的`initialize`方法
//        parent::initialize();
//        //TODO:自定义的初始化
//    }


    public function fetchAll(){
        $list = $this->all();
        // $a = json_decode(json_encode($list),true);
        return $list;
    }
}