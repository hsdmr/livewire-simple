<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'statu'];
    public function categories(){
        return $this->belongsToMany(Category::class,'category_posts','post_id','category_id');
    }
}
