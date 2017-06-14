<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    //处理博客有关的控制器
    
    /**
     * 构造函数
     */
    public function __construct()
    {
    }

    /**
     * 主页
     */
    public function home(Request $request){

        $uid = $request->session()->get('uid');
        $user = DB::table('users')->where('id',$uid)->first();

        $blogs = DB::table('blogs')->where('user_id',$uid)->get();
        $category = DB::table('categories')->where('user_id',$uid)->get();


        $data = [
            'category'=>$category,
            'blog'=>$blogs,
            'user'=>$user
        ];
    	return view('home.index',$data);
    }
    
    /**
     * 发表页面
     */
    public function index(Request $request)
    {
    	//获取分类
    	$uid = $request->session()->get('uid');
        $user = DB::table('users')->where('id',$uid)->first();

    	$categories = DB::table('categories')->where('user_id',$uid)->get();

    	$cates=array();
    	/*foreach ($categories as $cate) {
		    array_push($cates,$cate);
		}
*/
    	$data=[
    		'category' => $categories,
            'user'=>$user
    	];

    	return view('home.blog.index',$data);
    }

    /**
     * 博客列表
     */
    public function lists(Request $request){

    	$uid = $request->session()->get('uid');
        $user = DB::table('users')->where('id',$uid)->first();
    	$blogs= DB::table('blogs')->where('user_id',$uid)->get();
        $category = DB::table('categories')->where('user_id',$uid)->get();

        $data=[
            'blog'=>$blogs,
            'user'=>$user,
            'category'=>$category
        ];

        return view('home.blog.lists',$data);


    }

    /**
     * 发表博客
     */
    public function deliver(Request $request){

    	$uid = $request->session()->get('uid');
    	$title = $request->input('title','');
    	$category = $request->input('category','');
    	$label = $request->input('label','');
    	$content = $request->input('content','');

    	try {
    		DB::table("blogs")->insert([
    				'user_id'=>$uid,
    				'title'=>$title,
    				'category'=>$category,
    				'label'=>$label,
    				'content'=>$content
    			]);
    	} catch (Exception $e) {
    		return Redirect::back()->withInput()->with("fail","发表失败");
    	}

    	return redirect('/blog/index')->with("success","发表成功");

    }

    /**
     * 编辑页面
     */
    public function edit($id,Request $request){
        $blog = DB::table('blogs')->where('id',$id)->first();
        $uid = $request->session()->get('uid');
        $user = DB::table('users')->where('id',$uid)->first();
        $category = DB::table('categories')->where('user_id',$uid)->get();

        $data=[
            'blog'=>$blog,
            'user'=>$user,
            'category'=>$category
        ];

        return view('home.blog.editBlog',$data);
    }

    /**
     * 保存编辑
     */
    public function doEdit($id,Request $request){

        $uid = $request->session()->get('uid');
        $title = $request->input('title','');
        $category = $request->input('category','');
        $label = $request->input('label','');
        $content = $request->input('content','');

        try {
            DB::table("blogs")->where("id",$id)->update([
                    'title'=>$title,
                    'category'=>$category,
                    'label'=>$label,
                    'content'=>$content
                ]);
        } catch (Exception $e) {
            return Redirect::back()->withInput()->with("fail","编辑失败");
        }

        return Redirect::back()->with("success","编辑成功");

    }

    /**
     * 删除博文
     */
    public function del($id,Request $request){
        $uid = $request->session()->get('uid');
        $user = DB::table('users')->where('id',$uid)->first();

        try {
            DB::table('blogs')->where('id',$id)->delete();
        } catch (Exception $e) {
            return redirect('home.index');
        }
        return redirect('/blog');

    }

}
