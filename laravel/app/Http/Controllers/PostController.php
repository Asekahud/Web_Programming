<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Session;

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
    public function showAll()
    {
        $posts = DB::table('posts')->get();
        return view('post.myposts', ['posts' => $posts]);
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {
        $post = $request->all();
        $v = \Validator::make($request->all(),
         [
            'slug' => 'required',
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'published' => 'required',
            'published_at' => 'required',            
         ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            $data = array(
            'title' => $post['title'],
            'slug' => $post['slug'],
            'excerpt' => $post['excerpt'],
            'content' => $post['content'],
            'published' => $post['published'],
            'published_at' => $post['published_at'],
            );
            $i = DB::table('posts')->insert($data);
            if ($i > 0)
            {
                Session::flash('message','Post have been added succesfully');
                return redirect('/');
            }
        }
   }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        echo "edit " + $id;
    }
    public function update($id)
    {
        echo "delete " + $id;
    }
    public function destroy($id)
    {
        
    }
}

