<?php

namespace App\Http\Controllers\Cuber;

use App\Http\Controllers\Controller;
use App\Models\Cuber;
use App\Models\CuberCompetition;
use Illuminate\Http\Request;

class MyCompetitionController extends Controller
{
    public function index()
    {
        $page_name = 'My Competitions';
        $cuber = Cuber::where('user_id', auth()->id())->first();
        $my_competitions = CuberCompetition::where('cuber_id', $cuber->id)->with('competition')->paginate(5);

        return inertia('Cuber/Competition/Index', compact('page_name', 'my_competitions'));
    }

    public function show()
    {
        $page_name = 'Detail Competitions';

        return inertia('Cuber/Competition/Detail', compact('page_name'));
    }
}
