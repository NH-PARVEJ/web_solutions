<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::orderBy('name', 'asc')->get();
        $leaves = Leave::orderBy('id', 'asc')->get();
        return view('backend.pages.leave.manage', compact('employees', 'leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::orderBy('name', 'asc')->get();
        $leaves = Leave::orderBy('id', 'asc')->get();
        return view('frontend.pages.leave.create', compact('leaves', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $leaves = new Leave();

        $leaves->from      = $request->from;
        $leaves->to        = $request->to;
        $leaves->day       = $request->day;
        $leaves->reason    = $request->reason;
        $leaves->status    = $request->status;
        $leaves->user_id   = $request->user_id;

        $leaves->save();
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

        $leave       = Leave::find($id);
        $employee    = User::orderBy('name', 'asc')->get();
        if(!is_null($leave))
        return view('frontend.pages.leave.edit', compact('leave', 'employee'));

    }


        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_edit($id)
    {

        $leave       = Leave::find($id);
        $employee    = User::orderBy('name', 'asc')->get();
        if(!is_null($leave))
        return view('backend.pages.leave.edit', compact('leave', 'employee'));

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
        $leaves = Leave::find($id);

        if($leaves){
        $leaves->from      = $request->from;
        $leaves->to        = $request->to;
        $leaves->day       = $request->day;
        $leaves->reason    = $request->reason;
        // $leaves->status    = $request->status;

        $leaves->save();
        return redirect()->route('leave.create');
    }


    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_update(Request $request, $id)
    {
        $leaves = Leave::find($id);

        if($leaves){
        $leaves->from      = $request->from;
        $leaves->to        = $request->to;
        $leaves->day       = $request->day;
        $leaves->reason    = $request->reason;
        $leaves->status    = $request->status;

        $leaves->save();
        return redirect()->route('leave.manage');
    }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leaves = Leave::find($id);

        if(!is_null($leaves)){

            $leaves->delete();

            return redirect()->back();
             
        }
    }




        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_destroy($id)
    {
        $leaves = Leave::find($id);

        if(!is_null($leaves)){

            $leaves->delete();

            return redirect()->back();
             
        }
    }
}
