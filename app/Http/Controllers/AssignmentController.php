<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Assignment;
use App\Models\Staff;
use App\Models\Client;
use App\Models\Activity;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignment = Assignment::latest()->get();

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
            'client_id' => 'required',
            'activity_id' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'note' => '',
            'staff_id' => ['required', Rule::unique('assignments')->where(function ($q) use($request) {
                if($request->startDate) {
                    return $q->where('startDate', '<=', $request->startDate)->where('endDate', '>=', $request->startDate);
                }
        })],
        ],
        [
            'staff_id.required' => 'The staff\'s name field is required.',
            'client_id.required' => 'The client\'s name field is required.',
            'activity_id.required' => 'The activity field is required.',
        ]);

        // $validatedData = $request->validate([
        //     'staff_id' => ;

        // $validatedData['staff_id'] = Rule::unique('assignments')->where(function ($q) use($request) {
        //     return $q->where('startDate', '<=', $request->startDate)->where('endDate', '>=', $request->startDate);
        // });
        // dd($request);

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
            'note' => ''
        ],
        [
            'staff_id.required' => 'The staff\'s name field is required.',
            'client_id.required' => 'The client\'s name field is required.',
            'activity_id.required' => 'The activity field is required.',
        ]);

        if($req->staff_id != $assignment->staff_id) {
            $req->validate(['staff_id' => ['required', Rule::unique('assignments')->where(function ($q) use($req) {
                return $q->where('startDate', '<=', $req->startDate)->where('endDate', '>=', $req->startDate);
            })->ignore($assignment->id)]]);
        }
        if($req->client_id != $assignment->client_id) {
            $req->validate(['client_id' => 'required']);
        }
        // Today, August 3, it works well tho, so weird
        if($req->activity_id != $assignment->activity_id) {
            $req->validate(['activity_id' => ['required', Rule::unique('assignments')->where(function ($q) use($req) {
                return $q->where('client_id', $req->client_id);
            })->ignore($assignment->id)]]);
        }
        // itu doang
        if($req->date != $assignment->startDate) {
            $req->validate(['startDate' => 'required']);
        }
        if($req->date != $assignment->endDate) {
            $req->validate(['endDate' => 'required']);
        }
        if($req->note != $assignment->note) {
            $req->validate(['note' => '']);
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

    public function destroy($id)
    {
        Assignment::destroy($id);

        return redirect('/assignment/dataassignment');
    }
}
