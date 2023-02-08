<?php

namespace App\Http\Controllers\Cuber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $page_name = 'Statistics';

        return inertia('Cuber/Dashboard/Index', compact('page_name'));
    }
}
