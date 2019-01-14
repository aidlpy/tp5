<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{

    public  function index()
    {
        return $this->fetch('Index',[
            'user' => '345'
        ]);
    }

    public  function  demo(){
        dump(config());
    }
}
