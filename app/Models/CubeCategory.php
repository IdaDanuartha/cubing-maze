<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CubeCategory extends Model
{
    use HasFactory;

    protected $table = 'cube_categories';
    protected $guarded = [];

    public function competitions()
    {
        return $this->hasMany(CompetitionItem::class);
    }
}
