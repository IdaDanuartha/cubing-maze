<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

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

    public function show(Competition $id){
        $page_name = 'Detail Competition';
        $competition = Competition::findOrFail($id);

        return inertia('Admin/Competition/Detail', compact('page_name', 'competition'));
    }

    public function create(Competition $id){
        $page_name = 'Add Competition';

        return inertia('Admin/Competition/Create', compact('page_name'));
    }

    public function edit(){}

    public function update(){}

    public function destroy(){}
}
