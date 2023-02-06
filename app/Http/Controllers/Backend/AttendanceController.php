<?php

namespace App\Http\Controllers\Backend;

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
    
}