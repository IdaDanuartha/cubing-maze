<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function detail($slug)
    {
        $competition = Competition::where('slug', $slug)->with(['cuber_competitions', 'rounds.competition_event_rounds.cube_category'])->first();
        return inertia('Home/DetailCompetition', compact('competition'));
    }
}
