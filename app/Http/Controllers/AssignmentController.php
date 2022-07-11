<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Staff;
use App\Models\Client;
use App\Models\Activity;

class AssignmentController extends Controller
{
    public function index(Request $request)
    {
        $assignment = Assignment::latest()
                        ->when(isset($request->search), function($query) use($request) {
                            $query->whereHas('staff', function($query2) use($request) {
                                $query2->where('name', 'like', '%' . $request->search . '%');
                            })
                            ->orWhereHas('client', function($query3) use($request) {
                                $query3->where('company_name', 'like', '%' . $request->search . '%');
                            })
                            ->orWhereHas('activity', function($query4) use($request) {
                                $query4->where('activity', 'like', '%' . $request->search . '%');
                            });
                        })
                        ->orWhere('startDate', 'like', '%' . $request->search . '%')
                        ->orWhere('endDate', 'like', '%' . $request->search . '%')
                        ->paginate(3);

        return view('/assignment.index', [
            'title' => 'Meeting Timetable | Assignment',
            'assignments' => $assignment,
        ]);
        
    }

    public function create()
    {
        $staff = Staff::all();
        $client = Client::all();
        $activity = Activity::all();

        return view('/assignment.create', [
            'title' => 'Meeting Timetable | Assignment',
            'staffs' => $staff,
            'clients' => $client,
            'activities' => $activity
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'staff_id' => 'required',
            'client_id' => 'required',
            'activity_id' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'note' => 'required|max:100'
        ]);

        Assignment::create($validatedData);

        return redirect('/assignment/dataassignment');
    }

    public function show($id)
    {
        $assignment = Assignment::find($id);

        return view('/assignment.show', [
            'title' => 'Meeting Timetable | Detail Assignment',
            'assignment' => $assignment
        ]);
    }

    public function edit($id)
    {
        $assignment = Assignment::find($id);
        $staff = Staff::all();
        $client = Client::all();
        $activity = Activity::all();

        return view('/assignment.edit', [
            'title' => 'Meeting Timetable | Edit Assignment',
            'assignment' => $assignment,
            'staffs' => $staff,
            'clients' => $client,
            'activities' => $activity
        ]);
    }

    public function update(Request $req, $id)
    {
        $assignment = Assignment::find($id);

        $req->validate([
            'staff_id' => 'required',
            'client_id' => 'required',
            'activity_id' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'note' => 'required|max:100'
        ]);

        if($req->staff_id != $assignment->staff_id) {
            $req->validate(['staff_id' => 'required']);
        }
        if($req->client_id != $assignment->client_id) {
            $req->validate(['client_id' => 'required']);
        }
        if($req->activity_id != $assignment->activity_id) {
            $req->validate(['activity_id' => 'required']);
        }
        if($req->date != $assignment->startDate) {
            $req->validate(['startDate' => 'required']);
        }
        if($req->date != $assignment->endDate) {
            $req->validate(['endDate' => 'required']);
        }
        if($req->note != $assignment->note) {
            $req->validate(['note' => 'required|max:100']);
        }

        $assignment->update([
            'staff_id' => $req->staff_id,
            'client_id' => $req->client_id,
            'activity_id' => $req->activity_id,
            'startDate' => $req->startDate,
            'endDate' => $req->endDate,
            'note' => $req->note
        ]);

        return redirect('/assignment/dataassignment');
    }
}
