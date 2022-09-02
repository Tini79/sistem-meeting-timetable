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
        $datas = Client::with(['assignments' => function($q) {
            $q->orderBy('activity_id');
        }], 'assignments', 'assignments.activity', 'assignments.staff')->get();

        $rangeDate = [Carbon::now(), Carbon::now()->addDay(5)];

        if($request->has('dateFilter')){
            $stringDateRange = $request->dateFilter;
            $rangeDate = explode(' - ', $stringDateRange);
        }

        $periods = CarbonPeriod::create(Carbon::parse($rangeDate[0]), Carbon::parse($rangeDate[1]));

        $table = '<thead><tr><th rowspan="2" class="text-center">Klien</th><th rowspan="2" class="text-center">Kegiatan</th><th rowspan="2" class="text-center">Staff</th><th colspan="'.count($periods).'"class="text-center">Tanggal</th></tr>';
        $table .= '<tr>';
        foreach($periods as $period) {
            $date = $period->format('d/m/Y');
            $table .= '<th>'.$date.'</th>';
        }
        $table .= '</tr></tr></thead><td colspan="3"></td>';

        $jumlahStaff = Staff::count();
        // Loop pada setiap tanggal
        foreach($periods as $period) {
            // distinct : membedakan >> mencari data yang berbeda saja
                $jumlahStaffAssignments = Assignment::distinct('staff_id')->where('startDate', '<=', $period)->where('endDate', '>=', $period)->count();
                // Return jumlah staff yang tidak memiliki jadwal meeting dengan client
                $table .= '<td class="text-center">'.($jumlahStaff - $jumlahStaffAssignments).'/'.($jumlahStaff).'</td>';
        }

        $table .= '</tr>';

        foreach($datas as $data) {
            $columnRange = $data->assignments;
            $clientAssignment = '';
            $activityAssignment = '';
            $staffAssignment = '';
            foreach($data->assignments as $assignment) {
                // Additional
                $dates = CarbonPeriod::create(Carbon::parse($assignment->startDate), Carbon::parse($assignment->endDate));
                foreach($periods as $period) {
                    foreach($dates as $date) {
                        if($period == $date) {
                            $clientName = $assignment->client->company_name;
                            if($clientAssignment != $clientName) {
                                $clientAssignment = $clientName;
                                $totalRange = count($columnRange) + count($columnRange);
                                $table .= '<tr><td rowspan="'.$totalRange.'" class="bg-primary text-white text-sm col-4">'.$clientAssignment.'</td>';
                            } else {
                                $table .= '</tr>';
                            }

                            $activityName = $assignment->activity->activity;
                            if($activityAssignment != $activityName) {
                                $activityAssignment = $activityName;
                                $table .= '<td class="text-sm" rowspan="2">'.$assignment->activity->activity.'</td>';
                            } else {
                                $table .= '</tr>';
                            }

                            $staffName = $assignment->staff->name;
                            if($staffAssignment != $staffName) {
                                $staffAssignment = $staffName;
                                $table .= '<td class="text-sm" rowspan="2">'.$assignment->staff->name.'</td>';
                            } else {
                                $table .= '</tr>';
                            }
                        } else {
                            $table .= '</tr>';
                        }
                    }
                }
                // puff

                foreach($periods as $period) {
                    // Carbon's between function >> between function hanya bisa digunakan pada object Carbon which is $period
                    if($period->between($assignment->startDate, $assignment->endDate)) {
                        foreach($dates as $date) {
                            if($period == $date) {
                                $table .= '<td class="text-center text-uppercase bg-info custom-text-color font-weight-bolder">'.$assignment->staff->letter_code.'</td>';
                            }
                        }
                    } else {
                        $table .= '<td></td>';
                    }
                }
            }
        }

        return view('/dashboard.index', [
            'title' => 'Meeting TimeTable | Dashboard',
            'table' => $table,
        ]);
    }

    public function filterDate(Request $request) {
        return view('/dashboard.index', [
            'title' => 'Meeting TimeTable | Dashboard',
            'table' => $this->index($request)
        ]);
    }
}
