<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2019/1/4
 * Time: 4:22 PM
 */

namespace app\api\controller;
use app\api\model\User;
use app\api\common\Base;
use think\Config;
use think\Model;




class Index extends Base
{

    public function _initialize()
    {
        parent::_initialize();
    }

    public  function index()
    {

//        $test = $this->request->request('test');
//   		return $this->successReturn(['test'=>$test]);
         return dump(Config());
    }

    //获取
    public function fetchUserInfo()
    {

        $userid = $this->request->request('userid');
        if ($userid == NULL)
        {
            return $this->errorReturn(201,'参数错误');
        }
        $res =  User::get($userid);
        return $this->successReturn($res);

    }

    //增加
    public function register()
    {

        $phone = $this->request->request('phone');
        $password = $this->request->request('password');
        $user = new User();
        $user->username = '';
        $user->password = $password;
        $user->phone = $phone;
        $user->save();
        return $this->successReturn(['userid'=>$user->userid]);

    }

    //修改
    public function update()
    {
        $name = $this->request->request('username');
        $user = User::get(1);
        $user->username = $name;
        $user->save();
        return $this->successReturn($user);

    }

    //查询表内所有数据
    public function fetchAll(){

        Config::set('default_return_type','json');
        $list = model('User')->fetchall();
        return $this->successReturn($list);
    }


}