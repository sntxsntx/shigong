<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{   
    
    //呈递后台首页
    public function index(){
    	return view('Home.article.index');
    }

    //呈递文章列表页
    public function list(){
        $data = DB::table('article')->paginate(10);
        return view('Home.article.list',['articles'=>$data]);
    }

    //呈递文章添加页
    public function add(Request $request){
    	return view('Home.article.add');
    }

    //执行添加
    public function insert(Request $request){
    	$params = $request->all();
    	//校验数据
    	if((!$params['title']) || (!$params['content'])){
    		$result = array('code' => 100);
    		return json_encode($result);
    	}
    	$insertResult = DB::insert('insert into article (title, content) values (?, ?)', [$params['title'], $params['content']]);
        return $this->message($insertResult);
    }

    //获取具体文章信息
    public function getSpecific(Request $request){
        $params = $request->all();
        $result = DB::table('article')
                    ->where('id', '=', $params['id'])
                    ->get();
        return json_encode($result);
    }

    //执行修改文章
    public function edit(Request $request){
        $params = $request->all();
        //校验数据
        if((!$params['title']) || (!$params['content'])){
            $result = array('code' => 100);
            return json_encode($result);
        }
        $result = DB::table('article')
            ->where('id', $params['id'])
            ->update(['title' => $params['title'],'content' => $params['content']]);
        return $this->message($result);
        
    }

    //执行删除文章
    public function delete(Request $request){
        $params = $request->all();
        $result = DB::table('article')
                ->where('id', '=', $params['id'])
                ->delete();
        return $this->message($result);
    }

    //判断操作状态
    public function message($result){
        if($result){
            $result = array('code' => 200);
            return json_encode($result);
        }else{
            $result = array('code' => 400);
            return json_encode($result);
        }
    }


}
