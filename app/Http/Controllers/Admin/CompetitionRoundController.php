<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompetitionRound\StoreCompetitionRound;
use App\Http\Requests\CompetitionRound\UpdateCompetitionRound;
use App\Models\Competition;
use App\Models\CompetitionEventRound;
use App\Models\CompetitionRound;
use Illuminate\Http\Request;

class CompetitionRoundController extends Controller
{
    public function store(StoreCompetitionRound $request)
    {
        $round = new CompetitionRound($request->except(['competition_round_id', 'cube_categories']));
        
        try {
            $round->save();

            foreach($request->cube_categories as $category_id) {
                CompetitionEventRound::create([
                    'competition_round_id' => $round->id,
                    'cube_category_id' => $category_id
                ]);
            }
            
            session()->flash('success', 'Competition round created successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Competition round created failed');
        }
    }

    public function edit($id)
    {
        $round = CompetitionRound::findOrFail($id);
        $event_round = CompetitionEventRound::where('competition_round_id', $round->id)->get();

        return response()->json([$round, $event_round]);
    }

    public function update(UpdateCompetitionRound $request)
    {
        $round = CompetitionRound::findOrFail($request->competition_round_id);
        $event_round = CompetitionEventRound::where('competition_round_id', $round->id)->get();
        
        try {
            $round->round_name = $request->round_name;
            $round->update();

            if($request->cube_categories) {
                foreach($event_round as $event) {
                    $event->delete();
                } 
                
                foreach($request->cube_categories as $category_id) {
                    CompetitionEventRound::create([
                        'competition_round_id' => $round->id,
                        'cube_category_id' => $category_id
                    ]);
                }
            }
            
            session()->flash('success', 'Competition round updated successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Competition round updated failed');
        }
    }

    public function destroy($id)
    {
        $round = CompetitionRound::findOrFail($id);
        $event_round = CompetitionEventRound::where('competition_round_id', $round->id)->get();

        try {    
            foreach($event_round as $event) {
                $event->delete();
            }
            $round->delete();
            
            session()->flash('success', 'Competition round deleted successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Competition round deleted failed');
        }
    }
}
