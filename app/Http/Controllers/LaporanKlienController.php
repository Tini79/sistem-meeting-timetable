<?php

namespace App\Http\Controllers;

use App\Models\Client;
use PDF;

class LaporanKlienController extends Controller
{
    public function index()
    {
        $client = Client::orderBy('company_name', 'ASC')->get();

        return view('/laporan/klien.index', [
            'title' => 'Meeting Timetable | Laporan Data Klien',
            'clients' => $client
        ]);
    }

    /**
     * Show PDF file which load all of the data from the table.
     *
     * @return void
     */
    public function printPdf()
    {
        $clients = Client::orderBy('company_name', 'ASC')->get();

        $pdf = PDF::loadView('/laporan.klien.pdf', ['clients' => $clients]);

        return $pdf->stream();
    }
}
