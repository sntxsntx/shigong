<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //呈递登陆页面
    public function index(){
    	Session::forget('userInfo');
    	$userInfo = Session::get('userInfo');
    	if($userInfo){
    		return redirect('/Home/Article/index');
    	}else{
    		return view('Home.login.login');
    	}
        
    }

    //校验提交的数据
    public function checkInfo(Request $request){
    	$params = $request->all();
    	//校验数据
    	if((!$params['uname']) || (!$params['upass'])){
    		$result = array('code' => 100);
    		return json_encode($result);
    	}
    	$params['upass'] = md5($params['upass']);
    	$result = DB::select('select id,uname from user where uname = :uname and upass = :upass', ['uname' => $params['uname'],'upass' => $params['upass']]);
    	if(empty($result)){
    		$result = array('code' => 300);
    		return json_encode($result);
    	}
    	Session::put('userInfo',$params);
        Session::save();
        $result = array('code' => 200);
        return json_encode($result);
    }

    //退出登录
    public function logOut(){

    	$userInfo=Session::get('userInfo');
    	if(!isset($userInfo['isRember'])){
    		Session::forget('userInfo');
    		return redirect('/Home/Login/index');
    	}
    	return redirect('/Home/Registe/index');
    }




}
