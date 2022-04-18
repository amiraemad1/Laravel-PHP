<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public static $posts = [
        ['id' => 0, 'title' => 'laravel', 'description' => "php_framework", 'post_creator' => 'Amira', 'created_at' => '2022-04-17 10:00:00'],
        ['id' => 1, 'title' => 'JS', 'description' => "JavaScript", 'post_creator' => 'Amira', 'created_at' => '2022-04-17 10:26:00'],
        ['id' => 2, 'title' => 'Welcome', 'description' => "hello", 'post_creator' => 'Emad', 'created_at' => '2022-04-17 10:29:00'],
    ];

    public function index()
    {
        
        return view('posts.index', [
            'posts' => self::$posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return 'Stored';
        //in lab 2
    }

    public function show($postId)
    {
        return view('posts.show', ["post" => self::$posts[$postId]]);
    }

    public function edit($postId)
    {
        return view("posts.edit", ["post" => self::$posts[$postId]]);
    }

    public function update(Request $req)
    {
        $request = $req->all();
        self::$posts[$request['id']]['title'] = $request['title'];
        self::$posts[$request['id']]['description'] = $request['description'];
        self::$posts[$request['id']]['post_creator'] = $request['creator'];
        return view('posts.index', [
            'posts' => self::$posts,
        ]);
    }

    public function delete($id)
    {
        return 'Deleted';
        //in lab 2
    }
}