<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Competition\RegisterCompetitionRequest;
use App\Models\Competition;
use App\Models\CubeCategory;
use App\Models\Cuber;
use App\Models\CuberCompetition;
use App\Models\CuberCompetitionCategory;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function detail($slug)
    {
        $cuber = Cuber::where('user_id', auth()->id())->first();
        $competition = Competition::where('slug', $slug)->with(['cuber_competitions', 'rounds.competition_event_rounds.cube_category'])->first();
        $cube_categories = CubeCategory::all();

        return inertia('Home/DetailCompetition', compact('cuber', 'competition', 'cube_categories'));
    }

    public function registerComp(RegisterCompetitionRequest $request)
    {
        dd($request->all());
        $round = new CuberCompetition($request->except(['competition_round_id', 'cube_categories']));
        
        try {
            $round->save();

            foreach($request->cube_categories as $category_id) {
                CuberCompetitionCategory::create([
                    'competition_round_id' => $round->id,
                    'cube_category_id' => $category_id
                ]);
            }
            
            session()->flash('success', 'Competition round created successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Competition round created failed');
        }
    }
}
