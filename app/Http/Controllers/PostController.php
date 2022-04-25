<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use App\Http\Controllers\DB;
use Illuminate\Pagination\Paginator;


class PostController extends Controller
{
    public function index()
    {
    
       $posts = Post::paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        $users =  User::all();
        return view('posts.create', [
            'users' => $users,
        ]);
    }

    public function store()
    {
        $req = request()->all();
        Post::create([
            'title' =>  $req['title'],
            'description' =>  $req['description'],
            'user_id' => $req['creator'],
        ]);
        return redirect()->route('posts.index')->with('success');
        
    }

    public function show($postId)
    {
       $post = post::find($postId);
        $users =  User::all();
        return view("posts.show", [
            'post' => $post,
            'users' => $users,
        ]);
    }

    public function edit($postId)
    {
        $users = User::all();
        $post = Post::find($postId);
        return view('posts.edit', [
            'post' => $post,
            'users' => $users,
        ]);
    }

    public function update()
    {
        $req=request()->all();
        post::where('id',$req['id'])->update([
            'title'=>$req['title'],
            'description'=>$req['description'],
            'user_id'=>$req['creator']
        ]);
        return to_route('posts.index');
    }

    public function delete($postId)
    {
        post::where('id',$postId)->delete();
        return to_route('posts.index');
       
    }

    public function destory($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        return to_route('posts.index');
    }

}