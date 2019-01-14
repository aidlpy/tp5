<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2019/1/5
 * Time: 3:27 PM
 */
namespace app\api\model;
use think\Db;
use \think\Model;

Class User extends Model
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
        $a = json_decode(json_encode($list),true);
        return $a;
    }
}