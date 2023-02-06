<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $upcoming_competitions = Competition::whereDate('date_end', '>', Carbon::now()->format('Y-m-d H:i:s'))->with('cuber_competitions')->get();

        return inertia('Home/Index', compact('upcoming_competitions'));
    }
}
