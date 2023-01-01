<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuber;
use App\Models\CuberCourse;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $page = 'Statistics';

        $cubers_count = Cuber::whereMonth('created_at', Carbon::now()->month)->count();
        $reports_count = Report::whereBetween('created_at', 
        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $course_students = CuberCourse::latest()->get();
        $course_students_count = $course_students->count();
        $course_revenue = 0;

        foreach($course_students as $course) {
            $course_revenue += $course->course_price;
        }

        return inertia('Admin/Dashboard/Index', compact('page', 'cubers_count', 'reports_count', 'course_students_count', 'course_revenue'));
    }
}
