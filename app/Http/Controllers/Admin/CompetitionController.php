<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Http\Requests\Competition\StoreCompetitionRequest;
use App\Http\Requests\Competition\UpdateCompetitionRequest;
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
        $competition = Competition::findOrFail($id);

        return inertia('Admin/Competition/Detail', compact('page_name', 'competition'));
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
            
            session()->flash('success', 'Competition created successfully');
            return redirect()->route('competitions.index');
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
                if(File::exists('/storage' . $fileName)) {
                    File::delete('/storage' . $fileName);
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
            return back()->with('error', 'Competition created failed');
        }
    }

    public function destroy(){}
}
