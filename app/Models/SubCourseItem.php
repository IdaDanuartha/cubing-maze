<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCourseItem extends Model
{
    use HasFactory;

    protected $table = 'sub_course_items';
    protected $guarded = [];
}
