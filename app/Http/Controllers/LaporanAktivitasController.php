<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use PDF;

class LaporanAktivitasController extends Controller
{
    public function index()
    {
        $activities = Activity::with('assignments', 'assignments.staff')->orderBy('activity')->get();

        $staff = '';

        return view('/laporan/aktivitas/index', [
            'title' => 'Meeting Timetable | Laporan Data Aktivitas',
            'activities' => $activities,
            'staff' => $staff
        ]);
    }

    /**
     * Show PDF file which load all of the data from the table.
     *
     * @return void
     */
    public function printPdf()
    {
        $activities = Activity::with('assignments', 'assignments.staff')->orderBy('activity')->get();

        $staff = '';

        $pdf = PDF::loadView('/laporan.aktivitas.pdf', ['activities' => $activities, 'staff' => $staff]);

        return $pdf->stream();
    }
}
