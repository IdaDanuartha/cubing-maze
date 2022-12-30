<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionItem extends Model
{
    use HasFactory;

    protected $table = 'competition_items';
    protected $guarded = [];
}
