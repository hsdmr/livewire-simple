<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPosts extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','posts_id'];
}
