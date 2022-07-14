<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class DashboardController extends Controller
{
    public function index() 
    {
        $events = array();
        $assignments = Assignment::all();

        foreach($assignments as $assignment) {
            $events[] = [
                'title' => $assignment->activity->activity,
                'start' => $assignment->startDate,
                'end' => $assignment->endDate
            ];
        }
    
        return view('/dashboard.index', [
            'title' => 'Meeting TimeTable | Dashboard',
            'assignments' => $events
        ]);
    }
}
