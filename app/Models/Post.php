<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'text',
        'image',
        'category_id',
        'views',
        'user_id',
        'views',
        'likes',
        'dislikes'
    ];
}
