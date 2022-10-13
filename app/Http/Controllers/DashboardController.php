<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Staff;
use App\Models\Client;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $datas = Client::with(['assignments' => function ($q) {
            $q->orderBy('activity_id');
        }], 'assignments', 'assignments.activity', 'assignments.staff')->get();
        $rangeDate = [Carbon::now(), Carbon::now()->addDay(5)];

        if ($request->has('dateFilter')) {
            $stringDateRange = $request->dateFilter;
            $rangeDate = explode(' - ', $stringDateRange);
        }

        $periods = CarbonPeriod::create(Carbon::parse($rangeDate[0]), Carbon::parse($rangeDate[1]));

        $table = '<thead>
                    <tr>
                        <th rowspan="2" class="text-center">Klien</th>
                        <th rowspan="2" class="text-center">Kegiatan</th>
                        <th rowspan="2" class="text-center">Staff</th>
                        <th colspan="' . count($periods) . '"class="text-center">Tanggal</th>
                    </tr>';
        $table .= '<tr>';
        foreach ($periods as $period) {
            $table .= '<th><div class="text-center">' . $period->format('d') . '</div>';
            $table .= '<div class="text-center">' . $period->format('M') . '</div>';
            $table .= '<div class="text-center">' . $period->format('y') . '</div></th>';
        }
        $table .= '</tr></thead><tr><td colspan="3"></td>';

        $jumlahStaff = Staff::count();
        foreach ($periods as $period) {
            $jumlahStaffAssignments = Assignment::distinct('staff_id')->where('start_date', '<=', $period)->where('end_date', '>=', $period)->count();
            $table .= '<td class="text-center">' . ($jumlahStaff - $jumlahStaffAssignments) . '/' . ($jumlahStaff) . '</td>';
        }

        $table .= '</tr><tr>';

        foreach ($datas as $data) {
            $columnRange = $data->assignments;
            $clientAssignment = '';
            $activityAssignment = '';
            $staffAssignment = '';
            foreach ($data->assignments as $assignment) {
                $dates = CarbonPeriod::create(Carbon::parse($assignment->start_date), Carbon::parse($assignment->end_date));
                foreach ($periods as $period) {
                    foreach ($dates as $date) {
                        // if ($period == $date) {
                        $clientName = $assignment->client->company_name;
                        if ($clientAssignment != $clientName) {
                            $clientAssignment = $clientName;
                            $totalRange = count($columnRange);
                            $table .= '<td rowspan="' . $totalRange . '" class="bg-primary text-white text-sm col-4">' . $clientAssignment . '</td>';
                        }

                        $activityName = $assignment->activity->activity;
                        if ($activityAssignment != $activityName) {
                            $activityAssignment = $activityName;
                            $table .= '<td class="text-sm">' . $activityName . '</td>';
                        }

                        $staffName = $assignment->staff->name;
                        if ($staffAssignment != $staffName) {
                            $staffAssignment = $staffName;
                            $table .= '<td class="text-sm">' . $assignment->staff->name . '</td>';
                        }
                        // }
                    }
                }

                foreach ($periods as $period) {
                    if ($period->between($assignment->start_date, $assignment->end_date)) {
                        foreach ($dates as $date) {
                            if ($period == $date) {
                                $table .= '<td class="text-center text-uppercase bg-info custom-text-color font-weight-bolder h4">' . $assignment->staff->letter_code . '</td>';
                            }
                        }
                    } else {
                        $table .= '<td></td>';
                    }
                }
                $table .= '</tr>';
            }
        }

        return view('/dashboard.index', [
            'title' => 'Meeting TimeTable | Dashboard',
            'table' => $table,
        ]);
    }

    public function filterDate(Request $request)
    {
        return view('/dashboard.index', [
            'title' => 'Meeting TimeTable | Dashboard',
            'table' => $this->index($request)
        ]);
    }
}
