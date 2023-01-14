<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuberCompetitionCategory extends Model
{
    use HasFactory;

    protected $table = 'cuber_competition_categories';
    protected $guarded = [];

    public function cube_category()
    {
        return $this->belongsTo(CubeCategory::class);
    }
}
