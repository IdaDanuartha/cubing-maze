<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSelectedTag extends Model
{
    use HasFactory;

    protected $table = 'blog_selected_tags';
    protected $guarded = [];
}
