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
        $employees = User::orderBy('id', 'asc')->get();
        return view('frontend.pages.attendance.create', compact('employee_attendance','employees'));
    }

    public function manage()
    {
        $employee_attendance = Attendance::orderBy('id', 'asc')->get();
        $employees = User::orderBy('id', 'asc')->get();
        return view('backend.pages.attendance.manage', compact('employee_attendance','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee_attendance = Attendance::orderBy('id', 'asc')->get();
        $employees = User::orderBy('id', 'asc')->get();
        return view('frontend.pages.attendance.create', compact('employee_attendance','employees'));
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
        $current = Carbon::now();
        $employee_attendance = new Attendance();

        // if($employee_attendance->employee_attendance_code	 == $request->employee_attendance_code){  
        $employee_attendance->employee_attendance_code        = $request->employee_attendance_code;
        $employee_attendance->user_id                         = $request->user_id;
        $employee_attendance->time_in                         = $current;
        $employee_attendance->time_out                        = $current;
        $employee_attendance->ip_address                      = $employeeIP;
        
        $employee_attendance->save();
        return redirect()->back();
    // }  

    // else{
    //   echo '<div class="alert alert-warning" role="alert">please go your seat and submit only your attendance through the your account</div>';
        
    // }


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
