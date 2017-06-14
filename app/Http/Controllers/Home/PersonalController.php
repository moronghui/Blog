<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    /**
     * 处理用户控制器
     */
    
    /**
     * 用户登录页面
     * @return [type] [description]
     */
    public function login(){
    	return view('auth.login');
    }

    /**
     * 用户注册页面
     */
    public function register(){
    	return view('auth.register');
    }

    /**
     * 处理用户注册
     */
    public function doReg(Request $request){

    	//获取注册参数
    	$name = $request->input('name', '');
    	$email = $request->input('email', '');
    	$password = $request->input('password', '');
    	
    	//保存数据到数据库
    	try {
    		$res= DB::select('insert into users(`name`,`email`,`password`) value (:name,:email,:password)',['name'=>$name,'email'=>$email,'password'=>md5($password)]);
    	} catch (Exception $e) {
    		return Redirect::back()->withInput()->withErrors('注册失败');
    	}
    	//echo "注册成功";
    	return redirect('/login');
    }

    /**
     * 处理用户登录
     */
    public function doLogin(Request $request){

    	//获取注册参数
    	$email = $request->input('email', '');
    	$password = $request->input('password', '');

    	$user= DB::table('users')->where('email',$email)->first();

    	//var_dump($user);
    	
    	if ($user) {
    		if (md5($password) == $user->password) {
                $request->session()->put('uid', $user->id);
    			return redirect("/blog/index");
    		}
    		else{
                return Redirect::back()->withInput()->withErrors('账号和密码不匹配');
    		}
    	}
    	else{
            return Redirect::back()->withInput()->withErrors('该账号用户不存在');
    	}



    }
}
