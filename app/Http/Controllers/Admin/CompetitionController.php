<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Http\Requests\Competition\StoreCompetitionRequest;
use App\Http\Requests\Competition\UpdateCompetitionRequest;
use App\Models\CompetitionItem;
use App\Models\CompetitionRound;
use App\Models\CubeCategory;
use App\Models\CuberCompetition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompetitionController extends Controller
{
    public function index()
    {
        $page_name = 'Competitions';
        $competitions = Competition::when(request()->search_query, function($competitions) {
            $competitions = $competitions->where('name', 'like', '%' . request()->search_query . '%');
        })->latest()->paginate(5);

        return inertia('Admin/Competition/Index', compact('page_name', 'competitions'));
    }

    public function show($id)
    {
        $page_name = 'Detail Competition';

        $competition_rounds = CompetitionRound::when(request()->query_comp_round, function($competition_rounds) {
            $competition_rounds = $competition_rounds->where('round_name', 'like', '%' . request()->query_comp_round . '%');
        })->latest()->where('competition_id', $id)->with('competition_event_rounds.cube_category')->paginate(3);
        
        $competition_items = CompetitionItem::when(request()->query_comp_item, function($competition_items) {
            $competition_items = $competition_items->where('competition_id', 'like', '%' . request()->query_comp_item . '%');
        })->latest()->where('competition_id', $id)->with(['competition_round', 'cube_category'])->paginate(3);

        $cuber_competitions = CuberCompetition::when(request()->query_cuber_comp, function($cuber_competitions) {
            $cuber_competitions = $cuber_competitions->where('competition_id', 'like', '%' . request()->query_cuber_comp . '%');
        })->latest()->where('competition_id', $id)->with(['cuber', 'cuber_competition_categories.cube_category'])->paginate(3);

        $cube_categories = CubeCategory::latest()->get();

        return inertia('Admin/Competition/Detail', compact('page_name', 'competition_rounds', 'competition_items', 'cuber_competitions', 'cube_categories'));
    }

    public function create()
    {
        $page_name = 'Add Competition';

        return inertia('Admin/Competition/Create', compact('page_name'));
    }

    public function store(StoreCompetitionRequest $request) 
    {
        $competition = new Competition($request->validated());

        try {
            if($request->hasFile('competition_img')) {
                $uploadedImage = $request->file('competition_img')->store('uploads/competitions', 'public');
                $competition->competition_img = $uploadedImage;
            }  

            $competition->save();
            
            return redirect()->route('competitions.index')->with('success', 'Competition created successfully');;
        } catch (\Exception $e) {
            return back()->with('error', 'Competition created failed');
        }
              
    }

    public function edit($id)
    {
        $page_name = 'Edit Competition';
        $competition = Competition::findOrFail($id);

        return inertia('Admin/Competition/Edit', compact('page_name', 'competition'));
    }

    public function update(UpdateCompetitionRequest $request, $id){
        $competition = Competition::findOrFail($id);

        try {
            $fileName = $competition->competition_img;
            if($request->hasFile('competition_img')) {
                if(File::exists('storage/' . $fileName)) {
                    File::delete('storage/' . $fileName);
                }
                $fileName = $request->file('competition_img')->store('uploads/competitions', 'public');
            }  

            $competition->name = $request->name;
            $competition->competition_img = $fileName;
            $competition->description = $request->description;
            $competition->competitor_limit = $request->competitor_limit;
            $competition->type = $request->type;
            $competition->fee = $request->fee;
            $competition->date_start = $request->date_start;
            $competition->date_end = $request->date_end;
            $competition->password = $request->password;

            $competition->update();
            
            return redirect()->route('competitions.index')->with('success', 'Competition updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Competition updated failed');
        }
    }

    public function detail($id)
    {
        $competition = Competition::findOrFail($id);
        return response()->json($competition);
    }

    public function destroy($id)
    {
        $competition = Competition::findOrFail($id);

        try {    
            $path = $competition->competition_img;        
            if(File::exists('storage/' . $path)) {
                File::delete('storage/' . $path);
            }

            $competition->delete();
            
            session()->flash('success', 'Competition deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Competition deleted failed');
        }
    }
}
