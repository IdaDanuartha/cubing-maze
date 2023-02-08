<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionEvent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cube_category()
    {
        return $this->belongsTo(CubeCategory::class);
    }
}
