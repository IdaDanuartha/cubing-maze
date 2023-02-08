<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Competition\RegisterCompetitionRequest;
use App\Models\Competition;
use App\Models\CubeCategory;
use App\Models\Cuber;
use App\Models\CuberCompetition;
use App\Models\CompetitionEvent;
use App\Models\CuberCompetitionCategory;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function detail($slug)
    {
        $cuber = Cuber::where('user_id', auth()->id())->first();
        $competition = Competition::where('slug', $slug)->with(['cuber_competitions', 'rounds.competition_event_rounds.cube_category'])->first();
        $cube_categories = CompetitionEvent::where('competition_id', $competition->id)->with('cube_category')->get();
        $cuber_competition = CuberCompetition::where('competition_id', $competition->id)->where('cuber_id', $cuber->id)->count();

        return inertia('Home/DetailCompetition', compact('cuber', 'competition', 'cube_categories', 'cuber_competition'));
    }

    public function registerComp(RegisterCompetitionRequest $request)
    {
        $cuber_competition = new CuberCompetition($request->except(['cube_categories']));
        $get_cuber_competition = CuberCompetition::where('cuber_id', $request->cuber_id)->first();
        
        try {
            if($get_cuber_competition) {
                session()->flash('error', 'You already have register for this competition');
            } else {
                $cuber_competition->save();

                foreach($request->cube_categories as $category_id) {
                    CuberCompetitionCategory::create([
                        'cuber_competition_id' => $cuber_competition->id,
                        'cube_category_id' => $category_id
                    ]);
                }
            
                session()->flash('success', 'Registered successfully');
            }

        } catch (\Exception $e) {
            session()->flash('error', 'Registered failed');
        }
    }
}
