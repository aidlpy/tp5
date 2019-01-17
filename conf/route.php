<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2019/1/3
 * Time: 10:09 PM
 */

return [
    'index'              => 'index/Index/index',
    'news'               => 'index/login/register',//这种方法的话，传参的时候使用，http://你的VPSIP地址//news?id=5 后面id=5就是你定义的参数了
    'test'               => 'api/Index/index',
  	'getuserinfo'        => 'api/Index/fetchUserInfo',//获取用户信息
    'register'           => 'api/Index/register',//用户注册
    'update'             => 'api/Index/update', //用户更新
    'all'                => 'api/Index/fetchAll',//获取所有的

    "fetchNewsall"       => 'api/News/fetchNewslist'//获取新闻
];