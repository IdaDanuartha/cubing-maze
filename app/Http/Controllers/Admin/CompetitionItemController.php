<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompetitionItem\StoreCompetitionItem;
use App\Http\Requests\CompetitionItem\UpdateCompetitionItem;
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

        try {
            if($request->hasFile('scramble_img')) {
                $uploadedImage = $request->file('scramble_img')->store('uploads/scrambles', 'public');
                $item->scramble_img = $uploadedImage;
            }  

            $item->save();
            
            session()->flash('success', 'Competition scramble created successfully');;
        } catch (\Exception $e) {
            session()->flash('error', 'Competition scramble created failed');
        }
              
    }

    public function edit($id)
    {
        $item = CompetitionItem::findOrFail($id);
        $round_name = CompetitionRound::select('round_name')->where('id', $item->competition_round_id)->first();
        $category_name = CubeCategory::select('name')->where('id', $item->cube_category_id)->first();

        return response()->json([$item, $round_name, $category_name]);
    }

    public function update(UpdateCompetitionItem $request)
    {
        $item = CompetitionItem::findOrFail($request->competition_item_id);
        
        try {
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
        } catch (\Exception $e) {
            session()->flash('error', 'Competition scramble updated failed');
        }
    }
}
