<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RegisteController extends Controller
{   
    
    //呈递注册页面
    public function index(){
    	return view('Home.registe.registe');
    }

    //校验提交数据，并入库
    public function checkInfo(Request $request){
    	$params = $request->all();

    	//校验数据
    	if((!$params['userName']) || (!$params['passWord']) || ($params['passWord'] !== $params['rePassWord'])){
    		$result = array('code' => 100);
    		return json_encode($result);
    	}

    	//判断用户名是否已被注册
    	$result = DB::select('select * from user where uname = :uname', ['uname' => $params['userName']]);
    	$num = count($result);
    	if($num >= 1){
    		$result = array('code' => 300);
    		return json_encode($result);
    	}
    	
    	//入库
    	$params['passWord'] = md5($params['passWord']);
    	$insertResult = DB::insert('insert into user (uname, upass) values (?, ?)', [$params['userName'], $params['passWord']]);
    	if($insertResult){
    		$result = array('code' => 200);
    		return json_encode($result);
    	}else{
    		$result = array('code' => 400);
    		return json_encode($result);
    	}
		
    }
}
