<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class AktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = Activity::all();

        return view('/aktivitas/index', [
            'title' => 'Meeting Timetable | Aktivitas',
            'activities' => $activity
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/aktivitas.create', [
            'title' => 'Meeting Timetable | Tambah Aktivitas'
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
            'activity' => 'required|max:80'
        ]);

        Activity::create($validatedData);

        return redirect('/aktivitas/dataaktivitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::find($id);

        return view('/aktivitas.show', [
            'title' => 'Meeting Timetable | Detail Aktivitas', 
            'activity' => $activity
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
        $activity = Activity::find($id);

        return view('/aktivitas.edit', [
            'title' => 'Meeting Timetable | Ubah Aktivitas',
            'activity' => $activity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $activity = Activity::find($id);

        $request->validate([
            'activity' => 'required|max:80'
        ]);

        if($request->activity != $activity->activity) 
        $request->validate(['activity' => 'required']);
        
        $activity->update([
            'activity' => $request->activity
        ]);

        return redirect('/aktivitas/dataaktivitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::destroy($id);

        return redirect('/aktivitas/dataaktivitas');
    }
}
