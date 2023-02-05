<?php

namespace App\Http\Controllers\Frontend;
use File;
use Image;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::find($id);
        if(!is_null($employee)){
            return view('frontend.pages.employee.edit', compact('employee'));
        }
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
        $employee = User::find($id);

        if(!is_null($employee)){

                $employee->name                       = $request->name;
                $employee->phone                      = $request->phone;
                $employee->email                      = $request->email;
                $employee->address                    = $request->address;
                $employee->gender                     = $request->gender;

                if($request->image){
                    // delete image
                   if(File::exists('backend/assets/img/employee/' . $employee->image)){
                      File::delete('backend/assets/img/employee/' . $employee->image);
                    }
    
                if($request->image){
                    $image = $request->file('image');
                    $img = time() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('backend/assets/img/employee/' . $img);
                    Image::make($image)->save($location);
                    $employee->image = $img;
                }
            }

            }
    
    
                $employee->save();  
                return redirect()->route('employee.dashboard');

    }


}
