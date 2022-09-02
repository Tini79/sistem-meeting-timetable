<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use PDF;

class LaporanStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::latest()->get();
        return view('/laporan.staff.index', [
            'title' => 'Meeting Timetable | Laporan Data Staff',
            'staffs' => $staffs
        ]);
    }

    /**
     * Show PDF file which load all of the data from the table.
     *
     * @return void
     */
    public function printPdf()
    {
        $staffs = Staff::latest()->get();
        
        $pdf = PDF::loadView('/laporan.staff.pdf', ['staffs' => $staffs]);
    
        return $pdf->stream();
    }
}
