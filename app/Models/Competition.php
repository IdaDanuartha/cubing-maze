<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $table = 'competitions';
    protected $guarded = [];

    public function cuber_competitions()
    {
        return $this->hasMany(CuberCompetition::class);
    }
}
