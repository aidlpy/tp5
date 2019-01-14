<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2019/1/5
 * Time: 9:17 PM
 */

namespace app\api\common;
use think\Controller;
use think\Request;
use think\Websocket;

Class Base extends Controller{

    /**
     * @var Request Request 实例
     */
    protected $request;

    /**
     * 默认响应输出类型,支持json/xml
     * @var string
     */
    protected $responseType = 'json';


    /**
     * 构造方法
     * @access public
     * @param Request $request Request 对象
     */
    public function __construct(Request $request = null)
    {
        $this->request = is_null($request) ? Request::instance() : $request;

        // 控制器初始化
        $this->_initialize();

        // 前置操作方法
        if ($this->beforeActionList)
        {
            foreach ($this->beforeActionList as $method => $options)
            {
                is_numeric($method) ?
                    $this->beforeAction($options) :
                    $this->beforeAction($method, $options);
            }
        }
    }

    /**
     * 初始化操作
     * @access protected
     */
    protected function _initialize()
    {

        parent::_initialize();
    }

    public function successReturn($data)
    {
        return dump([
           'code' => 200,
           'data' => is_array($data)?$data:$data->toArray()
        ]);
    }

    public  function  errorReturn($code,$msg)
    {
        return  dump([
            'code' => $code,
            'msg'  => $msg,
            'data' => []
        ]);
    }


}