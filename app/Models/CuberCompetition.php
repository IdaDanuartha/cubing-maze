<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuberCompetition extends Model
{
    use HasFactory;

    protected $table = 'cuber_competitions';
    protected $guarded = [];

    public function cuber()
    {
        return $this->belongsTo(Cuber::class);
    }

    public function cuber_competition_categories()
    {
        return $this->hasMany(CuberCompetitionCategory::class);
    }
}
