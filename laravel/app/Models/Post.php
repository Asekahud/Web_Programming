<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function getPublishedPosts()
    {
        $posts = Post::latest('published_at')->published()->get();           
        return $posts;
    }
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now())
           ->where('published','=',1);
    }
     public function scopeUnPublished($query)
    {
        $query->where('published','=',0);
    }
    public function getUnPublishedPosts()
    {
        $posts = Post::latest('published_at')->unPublished()->get();           
        return $posts;
    }
    
}
