<?php
namespace App\Http\Controllers;

use \App\Post;

class PostController extends Controller
{
    //列表页面
    public function index(){
        $posts=Post::orderBy('created_at','desc')->paginate(6);
        //return view('post/index',['posts'=>$posts]);
        return view('post/index',compact('posts'));
    }

    //详情页
    public function show(Post $post){
        return view('post/show',compact('post'));
    }


    //创建页面
    public function create(){
        return view('post/create');
    }

    //创建逻辑
    public function store(){
        dd(request());
    }

    //编辑页面
    public function edit(){
        return view('post/edit');
    }

    //编辑逻辑
    public function update(){
        return;
    }

    //删除页面
    public function delete(){
        return;
    }
}