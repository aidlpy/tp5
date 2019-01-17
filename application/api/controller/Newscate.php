<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2019/1/17
 * Time: 11:51 PM
 */
namespace app\api\controller;
use app\api\common\Base;


class Newcate extends Base
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public  function  fetchNewslist()
    {

        $list = model('News')->fetchall();
        return $this->successReturn($list);

    }
}