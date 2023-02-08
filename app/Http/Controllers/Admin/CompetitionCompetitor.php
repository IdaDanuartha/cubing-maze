<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CuberCompetition;
use App\Models\CuberCompetitionCategory;
use Illuminate\Http\Request;

class CompetitionCompetitor extends Controller
{
    public function edit($id)
    {
        $competitor = CuberCompetition::where('id', $id)->with('cuber')->first();

        return response()->json($competitor);
    }

    public function destroy($id)
    {
        $competitor = CuberCompetition::find($id);
        $competitor_event = CuberCompetitionCategory::where('cuber_competition_id', $competitor->id)->get();
        try {    
            foreach($competitor_event as $event) {
                $event->delete();
            }
            $competitor->delete();
            
            session()->flash('success', 'Competitor deleted successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Competitor deleted failed');
        }
    }
}
