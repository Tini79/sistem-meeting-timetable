<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use PDF;


class LaporanKinerjaStaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::with('assignments')->orderBy('name', 'ASC')->get();

        return view('/laporan.kinerjastaff.index', [
            'title' => 'Meeting Timetable | Laporan Data Staff',
            'staffs' => $staffs
        ]);
    }

    public function printPdf()
    {
        $staffs = Staff::with('assignments')->orderBy('name', 'ASC')->get();

        $pdf = PDF::loadView('/laporan.kinerjastaff.pdf', ['staffs' => $staffs]);

        return $pdf->stream();
    }
}
