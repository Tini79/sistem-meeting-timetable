<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $staff = Staff::staff(request(['search']))
        //                 ->latest()->paginate(3);

        $staff = Staff::all();

        return view('/staff.index', [
            'title' => 'Meeting Timetable | Staff',
            'staffs' => $staff
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/staff.create', [
            'title' => 'Meeting Timetable | Tambah Staff',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'phone' => 'required|max:13'
        ]);

        Staff::create($validatedData);

        return redirect('/staff/datastaff');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);

        return view('/staff.show', [
            'title' => 'Meeting Table | Staff Detail',
            'staff' => $staff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);

        return view('/staff.edit', [
            'title' => 'Meeting Timetable | Edit Staff',
            'staff' => $staff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $staff = Staff::find($id);

        $req->validate([
            'name' => 'required|min:5|max:100',
            'phone' => 'required|max:13'
        ]);

        if($req->name != $staff->name)
        $req->validate(['name' => 'required']);
        if($req->phone != $staff->phone)
        $req->validate(['phone' => 'required']);

        $staff->update([
            'name' => $req->name,
            'phone' => $req->phone
        ]);

        return redirect('/staff/datastaff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::destroy($id);

        return redirect('/staff/datastaff')->with('success', 'Berhasil hapus data!');
    }
}
