<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

class PostController extends Controller {
    public function published(Post $postModel)
    {
        $posts = $postModel->getPublishedPosts();
        return view('post.index', ['posts' => $posts]);
    }
    public function unpublished(Post $postModel)
    {
        $posts = $postModel->getUnPublishedPosts();
        return view('post.index', ['posts' => $posts]);
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(Post $postModel, Request $request)
    {
        
        //dd($request->all());
        $postModel->create($request->all());
        return redirect()->route('/');
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        
    }
    public function update($id)
    {
        
    }
    public function destroy($id)
    {
        
    }
}

