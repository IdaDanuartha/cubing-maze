<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateReview extends Model
{
    use HasFactory;

    protected $table = 'rate_reviews';
    protected $guarded = [];
}
