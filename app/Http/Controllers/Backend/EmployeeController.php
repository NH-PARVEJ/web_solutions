<?php

namespace App\Http\Controllers\Backend;
use File;
use Image;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employee_profile($id)
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
    public function employee_view($id)
    {
        $employee     = User::find($id);
        $attendances  = Attendance::orderBy('id', 'asc')->get(); 
        if(!is_null($employee)){
            return view('backend.pages.profile', compact('employee', 'attendances'));
        } 
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $employees = User::orderBy('id', 'asc')->get();
        return view('backend.pages.employee.manage', compact('employees'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::orderBy('id', 'asc')->where('role', 2)->get();
        return view('backend.pages.employee.manage', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new User();
        if( $request->password == $request->repeat_password){
            $employee->password                   = Hash::make($request->password);
            $employee->name                       = $request->name;
            $employee->phone                      = $request->phone;
            $employee->email                      = $request->email;
            $employee->address                    = $request->address;
            $employee->designation                = $request->designation;
            $employee->department                 = $request->department;
            $employee->gender                     = $request->gender;
            $employee->role                       = $request->role;
            $employee->status                     = $request->status;


            if($request->image){
                $image = $request->file('image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/assets/img/employee/' . $img);
                Image::make($image)->save($location);
                $employee->image = $img;
            }

            $employee->save();  
            return redirect()->back();

    }

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
    
        $employee = User::find($id);
        if(!is_null($employee)){
            return view('backend.pages.employee.edit', compact('employee'));
        }

        else{
            #404 Page
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
                $employee->designation                = $request->designation;
                $employee->department                 = $request->department;
                $employee->gender                     = $request->gender;
                $employee->role                       = $request->role;
                $employee->status                     = $request->status;

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
                return redirect()->route('employee.manage');

     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::find($id);
        if(!is_null($employee)){
            $employee->delete();
            return redirect()->route('employee.manage');
        }
        else{
// 404
        }
    }
}
