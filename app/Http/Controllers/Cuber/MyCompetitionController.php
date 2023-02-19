<?php

namespace App\Http\Controllers\Cuber;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Cuber;
use App\Models\CuberCompetition;
use App\Models\CuberCompetitionCategory;
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

    public function show($slug)
    {
        $page_name = 'Detail Competitions';
        $competition = Competition::where('slug', $slug)->with(['cuber_competitions', 'rounds.competition_event_rounds.cube_category'])->first();
        $competitors = CuberCompetition::where('competition_id', $competition->id)->with(['cuber', 'cuber_competition_categories.cube_category'])->paginate(10);

        return inertia('Cuber/Competition/Detail', compact('page_name', 'competition', 'competitors'));
    }

    public function edit($id)
    {
        $cuber_competition = CuberCompetition::where('id', $id)->with('competition')->first();

        return response()->json($cuber_competition);
    }

    public function destroy($id)
    {
        $cuber_competition = CuberCompetition::findOrFail($id);
        $competitor_categories = CuberCompetitionCategory::where('cuber_competition_id', $cuber_competition->id)->get();

        try {    
            foreach($competitor_categories as $event) {
                $event->delete();
            }
            $cuber_competition->delete();
            
            session()->flash('success', 'Competition deleted successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Competition deleted failed');
        }
    }
}
