<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CubeCategory;
use Illuminate\Http\Request;

class CompetitionCategoryController extends Controller
{
    public function index()
    {
        $page_name = 'Competition Event';
        $categories = CubeCategory::when(request()->search_query, function($categories) {
            $categories = $categories->where('name', 'like', '%' . request()->search_query . '%');
        })->latest()->paginate(5);

        return inertia('Admin/Competition/Category/Index', compact('page_name', 'categories'));
    }

    // public function store(StoreCompetitionRequest $request) 
    // {
    //     $competition = new Competition($request->validated());

    //     try {
    //         if($request->hasFile('competition_img')) {
    //             $uploadedImage = $request->file('competition_img')->store('uploads/competitions', 'public');
    //             $competition->competition_img = $uploadedImage;
    //         }  

    //         $competition->save();
            
    //         return redirect()->route('competitions.index')->with('success', 'Competition created successfully');;
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Competition created failed');
    //     }
              
    // }

    // public function edit($id)
    // {
    //     $item = CompetitionItem::findOrFail($id);
    //     $round_name = CompetitionRound::select('round_name')->where('id', $item->competition_round_id)->first();
    //     $category_name = CubeCategory::select('name')->where('id', $item->cube_category_id)->first();

    //     return response()->json([$item, $round_name, $category_name]);
    // }

    // public function update(UpdateCompetitionRequest $request, $id){
    //     $competition = Competition::findOrFail($id);

    //     try {
    //         $fileName = $competition->competition_img;
    //         if($request->hasFile('competition_img')) {
    //             if(File::exists('storage/' . $fileName)) {
    //                 File::delete('storage/' . $fileName);
    //             }
    //             $fileName = $request->file('competition_img')->store('uploads/competitions', 'public');
    //         }  

    //         $competition->name = $request->name;
    //         $competition->competition_img = $fileName;
    //         $competition->description = $request->description;
    //         $competition->competitor_limit = $request->competitor_limit;
    //         $competition->type = $request->type;
    //         $competition->fee = $request->fee;
    //         $competition->date_start = $request->date_start;
    //         $competition->date_end = $request->date_end;
    //         $competition->password = $request->password;

    //         $competition->update();
            
    //         return redirect()->route('competitions.index')->with('success', 'Competition updated successfully');
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Competition updated failed');
    //     }
    // }

    // public function detail($id)
    // {
    //     $competition = Competition::findOrFail($id);
    //     return response()->json($competition);
    // }

    // public function destroy($id)
    // {
    //     $competition = Competition::findOrFail($id);

    //     try {    
    //         $path = $competition->competition_img;        
    //         if(File::exists('storage/' . $path)) {
    //             File::delete('storage/' . $path);
    //         }

    //         $competition->delete();
            
    //         session()->flash('success', 'Competition deleted successfully');
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Competition deleted failed');
    //     }
    // }
}
