<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2019/1/5
 * Time: 9:17 PM
 */

namespace app\api\common;
use Firebase\JWT\JWT;
use think\Controller;
use think\Request;
use think\Websocket;
use think\Config;


Class Base extends Controller
{

    /**
     * @var Request Request 实例
     */
    protected $request;

    /**
     * 默认响应输出类型,支持json/xml
     * @var string
     */
    // protected $responseType = 'json';

    static  protected  $string =122;


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
        if ($this->beforeActionList) {
            foreach ($this->beforeActionList as $method => $options) {
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
        return [
            'code' => 200,
            'data' => is_array($data) ? $data : $data->toArray()
        ];
    }

    public function errorReturn($code, $msg)
    {
        return [
            'code' => $code,
            'msg' => $msg,
            'data' => []
        ];
    }


    public function getToken()
    {
        $key = "huang";  //这里是自定义的一个随机字串，应该写在config文件中的，解密时也会用，相当    于加密中常用的 盐  salt
        $token = [
            "iss" => "",  //签发者 可以为空
            "aud" => "", //面象的用户，可以为空
            "iat" => time(), //签发时间
            "nbf" => time() + 100, //在什么时候jwt开始生效  （这里表示生成100秒后才生效）
            "exp" => time() + 7200, //token 过期时间
            "uid" => 123 //记录的userid的信息，这里是自已添加上去的，如果有其它信息，可以再添加数组的键值对
        ];
        $jwt = JWT::encode($token, $key, "HS256"); //根据参数生成了 token
        return json([
            "token" => $jwt
        ]);
    }


    public function check()
    {
        $jwt = input("token");  //上一步中返回给用户的token
        $key = "huang";  //上一个方法中的 $key 本应该配置在 config文件中的
        $info = JWT::decode($jwt, $key, ["HS256"]); //解密jwt
        return json($info);
    }

}