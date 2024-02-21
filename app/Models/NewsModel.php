<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['title', 'description', 'category_id'];
}
