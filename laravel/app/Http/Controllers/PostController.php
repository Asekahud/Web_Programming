<?php namespace App\Http\Controllers;

//use Request; //for make transaction or process
use Illuminate\Pagination\LengthAwarePaginator; //for make transaction or process
use App\Models\Post;
use Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
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
        $posts = DB::table('posts')->paginate(5);
        return view('post.myposts', ['posts' => $posts]);
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {
        $post = Request::input();
         
        $validation = \Validator::make($request::all(),
         [
            'slug' => 'required',
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'published' => 'required',
            'published_at' => 'required',            
         ]);
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors());
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
            $insert = DB::table('posts')->insert($data);
            if ($insert > 0)
            {
                \Session::flash('message','Post have been added succesfully');
                return redirect('/');
            }
        }
   }
    public function searchForm()
    {
        $categories = \DB::table('categories')->lists('category_name','id');
        return view('post.search_form', ['categories'=> $categories]);
    }
    public function search(Request $request)
    {
       
       $searchterm = Request::input('search');
       $category_id = Request::input('category');
       $category = DB::table('categories')->where('id',$category_id)->value('category_name');
       $posts = DB::table('posts')->where($category,'LIKE', '%'.$searchterm.'%')->paginate(5);
       return view('post.search_results',['posts' => $posts]);
    }
    public function edit($id)
    {
        $post = DB::table('posts')->where('id',$id)->first();
        return view('post.edit',['post' => $post]);      
    }
    public function update(Request $request)
    {
        $post = Request::input();
        $validation = \Validator::make(Request::input(),
         [
            'slug' => 'required',
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'published' => 'required',
            'published_at' => 'required',            
         ]);
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors());
        }
         else
         {
            $data = array(
              'id' => $post['id'],  
              'title' => $post['title'],
              'slug' => $post['slug'],
              'excerpt' => $post['excerpt'],
              'content' => $post['content'],
              'published' => $post['published'],
              'published_at' => $post['published_at'],
            );
            $update = DB::table('posts')->where('id',$data['id'])->update($data);
            if ($update > 0)
            {
                \Session::flash('message','Post have been updated succesfully');
                return redirect('myposts');
            }
        }
    }
    public function delete($id)
    {
        $delete = DB::table('posts')->where('id',$id)->delete();
        if ($delete > 0)
        {
            \Session::flash('message','Post have been deleted succesfully');
            return redirect('myposts');
        }
    }
}

