<?php
namespace App\Http\Controllers;

use \App\Post;

class PostsController extends Controller
{
    //列表页面
    public function index(){
        $posts=Post::orderBy('created_at','desc')->paginate(6);
        //return view('posts/index',['posts'=>$posts]);
        return view('posts/index',compact('posts'));
    }

    //详情页
    public function show(Post $post){
        return view('posts/show',compact('post'));
    }


    //创建页面
    public function create(){
        return view('posts/create');
    }

    //创建逻辑
    public function store(){
        //dd(request()->all());
    /*    $posts=new Post();
        $posts->title=request('title');
        $posts->content=request('content');
        $posts->save();
    */
    //验证
        $this->validate(request(),[
            'title'=>'required|string|max:100|min:5',
            'content'=>'required|string|max:255|min:10',
        ]);

        $post=Post::create(request(['title','content']));
        //重定位到文章列表页
        return redirect('/posts');
    }

    //编辑页面
    public function edit(){
        return view('posts/edit');
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