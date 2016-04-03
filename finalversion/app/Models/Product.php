<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id','user_id','name','school', 'excerpt',  'description', 'image','price',
    ];
    public $timestamps = false;
    
    protected $hidden = [
        
    ];
}
