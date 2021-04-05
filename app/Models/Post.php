<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    public function user(){
         return $this->belongsTo('App\Models\User');
    }
    public function category(){
        return $this->belongsToMany(Category::class,'category_post', 'post_id', 'category_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }


  
}



