<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionEventRound extends Model
{
    use HasFactory;

    protected $table = 'competition_event_rounds';
    protected $guarded = [];
}
