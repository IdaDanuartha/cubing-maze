<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        $page = 'Competitions';
        $competitions = Competition::latest()->paginate(10);

        return inertia('Admin/Competition/Index', compact('page', 'competitions'));
    }

    public function show(){}

    public function edit(){}

    public function update(){}

    public function destroy(){}
}
