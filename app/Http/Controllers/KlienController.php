<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CLient;

class KlienController extends Controller
{
    public function index() 
    {
        return view('/klien.index', [
            'title' => 'Meeting Timetable | Klien',
            'clients' => Client::client(request(['search']))->latest()->paginate(3)
        ]);
    }

    public function create() 
    {
        return view('/klien/create', [
            'title' => 'Meeting Timetable | Tambah Klien',
        ]);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'company_name' => 'required|min:5|max:100',
            'addr' => 'required|min:5|max:100',
            'phone' => 'required|max:13'
        ]);

        Client::create($validatedData);

        return redirect('/klien/dataklien');
    }

    public function show($id) 
    {
        $client = Client::find($id);

        return view('/klien.show', [
            'title' => 'Meeting Table | Detail Klien',
            'client' => $client
        ]);
    }

    public function edit($id) 
    {
        
        return view('/klien.edit', [
            'title' => 'Meeting Timetable | Edit Klien',
            'client' => Client::find($id)
        ]);

    }

    public function update(Request $req, $id) 
    {
        $client = Client::find($id);

        $req->validate([
            'company_name' => 'required|min:5|max:100',
            'addr' => 'required|min:5|max:100',
            'phone' => 'required|max:13'
        ]);

        if($req->company_name != $client->company_name) {
            $req->validate(['company_name' => 'required']);
        }
        if($req->addr != $client->addr) {
            $req->validate(['addr' => 'required']);
        }
        if($req->phone != $client->phone) {
            $req->validate(['phone' => 'required']);
        }

        $client->update([
            'company_name' => $req->company_name,
            'addr' => $req->addr,
            'phone' => $req->phone
        ]);

        return redirect('/klien/dataklien')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id) 
    {
        Client::destroy($id);

        return redirect('/klien/dataklien');
    }

}
