<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Staff;
use App\Models\User;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::latest()->get();

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
        $staffs = Staff::all();

        foreach (range('a', 'z') as $letter) {
            $staff_codes[] = $letter;
        }

        return view('/staff.create', [
            'title' => 'Meeting Timetable | Tambah Staff',
            'staffs' => $staffs,
            'codes' => $staff_codes,
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
            'letter_code' => ['required', 'max:1', Rule::unique('staffs')->where(function ($q) use ($request) {
                return $q->where('letter_code', $request->letter_code);
            })],
            'phone' => 'required|max:13',
            'username' => 'required',
            'password' => 'required|min:5',
            'staff_id' => '',
            'level' => 'required'
        ]);


        $validatedData['password'] = bcrypt($validatedData['password']);

        $staff = Staff::create($validatedData);
        $staffIds = $staff->latest()->get('id')->take(1);

        foreach ($staffIds as $staffId) {
            $id = $staffId->id;
            User::insert([
                'username' => $validatedData['username'],
                'password' => $validatedData['password'],
                'level'    => $validatedData['level'],
                'staff_id' => $id
            ]);
        }

        return redirect('/tools/staff/datastaff');
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
            'staff' => $staff,
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
        $staff = Staff::with('user')->find($id);

        return view('/staff.edit', [
            'title' => 'Meeting Timetable | Edit Staff',
            'staff' => $staff,
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
        $staff = Staff::with('user')->find($id);

        $req->validate([
            'name' => 'required|min:5|max:100',
            'letter_code' => 'required|max:1',
            'phone' => 'required|max:13',
        ]);


        if ($req->name != $staff->name)
            $req->validate(['name' => 'required']);
        if ($req->letter_code != $staff->letter_code)
            $req->validate(['letter_code' => ['required', Rule::unique('staffs')->where(function ($q) use ($req) {
                return $q->where('letter_code', $req->letter_code);
            })]]);
        if ($req->phone != $staff->phone)
            $req->validate(['phone' => 'required']);

        $staff->update([
            'name' => $req->name,
            'letter_code' => $req->letter_code,
            'phone' => $req->phone,
        ]);

        return redirect('/tools/staff/datastaff');
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

        return redirect('/tools/staff/datastaff');
    }
}
