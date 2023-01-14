<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionRound extends Model
{
    use HasFactory;

    protected $table = 'competition_rounds';
    protected $guarded = [];

    public function competition_event_rounds()
    {
        return $this->hasMany(CompetitionEventRound::class);
    }
}
