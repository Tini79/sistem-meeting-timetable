<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use PDF;

class LaporanAssignmentController extends Controller
{
    public function index()
    {
        $assignment = Assignment::with(['staff' => function ($q) {
            $q->orderBy('name');
        }])->get();

        return view('/laporan/assignment.index', [
            'title' => 'Meeting Timetable | Laporan Data Assignment',
            'assignments' => $assignment,
        ]);
    }

    public function printPdf()
    {
        $assignments = Assignment::with(['staff' => function ($q) {
            $q->orderBy('name');
        }])->get();

        $pdf = PDF::loadView('/laporan.assignment.pdf', ['assignments' => $assignments]);

        return $pdf->stream();
    }
}
