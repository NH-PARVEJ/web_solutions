<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee_attendance = Attendance::orderBy('id', 'asc')->get();
        $employees = User::orderBy('name', 'asc')->get();
        return view('backend.pages.attendance.manage', compact('employee_attendance','employees'));
    }

    public function manage()
    {
        $current = Carbon::now();
        $employee_attendance = Attendance::orderBy('id', 'asc')->get();
        $employees = User::orderBy('id', 'asc')->get();
        return view('backend.pages.attendance.manage', compact('employee_attendance','employees', 'current'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employeeIP = request()->ip();
        $employee_attendance = new Attendance();


        $employee_attendance->user_id                         = $request->user_id;
        $employee_attendance->time_in                         = $request->time_in;
        $employee_attendance->time_out                        = $request->time_out;
        $employee_attendance->ip_address                      = $employeeIP;
        
        $employee_attendance->save();
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
