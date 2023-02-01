<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class FrontendController extends Controller
{  
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function employee_dashboard()
    {
        $attendances  = Attendance::orderBy('id', 'asc')->get(); 
        return view('frontend.pages.dashboard', compact('attendances'));
    } 


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function profile($id)
    {
        $employee     = User::find($id);
        $attendances  = Attendance::orderBy('id', 'asc')->get(); 
        if(!is_null($employee)){
            return view('frontend.pages.employee.profile', compact('employee', 'attendances'));
        }

    } 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
