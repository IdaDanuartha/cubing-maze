<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompetitionItem\StoreCompetitionItem;
use App\Http\Requests\CompetitionItem\UpdateCompetitionItem;
use App\Models\Competition;
use App\Models\CompetitionItem;
use App\Models\CompetitionRound;
use App\Models\CubeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompetitionItemController extends Controller
{
    public function store(StoreCompetitionItem $request) 
    {
        $item = new CompetitionItem($request->validated());
        $competition = Competition::findOrFail($request->competition_id);
        $competition_date = Competition::where('id', $request->competition_id)
                                    ->whereDate('date_start', '<=', $request->date)
                                    ->whereDate('date_end', '>=', $request->date)
                                    ->first();

        try {
            if($competition_date) {
                if($request->hasFile('scramble_img')) {
                    $uploadedImage = $request->file('scramble_img')->store('uploads/scrambles', 'public');
                    $item->scramble_img = $uploadedImage;
                }  
    
                $item->save();
                session()->flash('success', 'Competition scramble created successfully');;
            } else {
                session()->flash('error', 'Date must be between ' . date_format(date_create($competition->date_start), "d M Y") . ' and ' . date_format(date_create($competition->date_end), "d M Y"));
            }
            
        } catch (\Exception $e) {
            session()->flash('error', 'Competition scramble created failed ' . $e->getMessage());
        }
              
    }

    public function edit($id)
    {
        $item = CompetitionItem::findOrFail($id);
        $round_name = CompetitionRound::select('round_name')->where('id', $item->competition_round_id)->first();
        $category_name = CubeCategory::select('name')->where('id', $item->cube_category_id)->first();

        return response()->json([$item, $round_name, $category_name]);
    }

    public function update(UpdateCompetitionItem $request, $id)
    {
        $item = CompetitionItem::findOrFail($id);
        $competition = Competition::findOrFail($request->competition_id);
        $competition_date = Competition::where('id', $request->competition_id)
                                    ->whereDate('date_start', '<=', $request->date)
                                    ->whereDate('date_end', '>=', $request->date)
                                    ->first();

        try {
            if($competition_date) {
                $fileName = $item->scramble_img;
                if($request->hasFile('scramble_img')) {
                    if(File::exists('storage/' . $fileName)) {
                        File::delete('storage/' . $fileName);
                    }
                    $fileName = $request->file('scramble_img')->store('uploads/scrambles', 'public');
                }

                $item->competition_round_id = $request->competition_round_id;
                $item->cube_category_id = $request->cube_category_id;
                $item->date = $request->date;
                $item->scramble_img = $fileName;
                $item->update();
                
                session()->flash('success', 'Competition scramble updated successfully');
            } else {
                session()->flash('error', 'Date must be between ' . date_format(date_create($competition->date_start), "d M Y") . ' and ' . date_format(date_create($competition->date_end), "d M Y"));
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Competition scramble updated failed');
        }
    }

    public function destroy($id)
    {
        $item = CompetitionItem::findOrFail($id);

        try {    
            $path = $item->scramble_img;        
            if(File::exists('storage/' . $path)) {
                File::delete('storage/' . $path);
            }

            $item->delete();
            
            session()->flash('success', 'Competition scramble successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Competition scramble failed');
        }
    }
}
