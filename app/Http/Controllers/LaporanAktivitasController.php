<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use PDF;
class LaporanAktivitasController extends Controller
{
    public function index()
    {
        $activity = Activity::latest()->get();

        return view('/laporan/aktivitas/index', [
            'title' => 'Meeting Timetable | Laporan Data Aktivitas',
            'activities' => $activity
        ]);
    }

    /**
     * Show PDF file which load all of the data from the table.
     *
     * @return void
     */
    public function printPdf()
    {
        $activities = Activity::latest()->get();
        
        $pdf = PDF::loadView('/laporan.aktivitas.pdf', ['activities' => $activities]);
    
        return $pdf->stream();
    }
}
