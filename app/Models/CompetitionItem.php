<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionItem extends Model
{
    use HasFactory;

    protected $table = 'competition_items';
    protected $guarded = [];

    public function competition_round()
    {
        return $this->belongsTo(CompetitionRound::class);
    }

    public function cube_category()
    {
        return $this->belongsTo(CubeCategory::class);
    }
}
