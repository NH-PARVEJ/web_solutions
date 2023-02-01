@extends('backend.layout.template')
<div class="page-wrapper">
    <div class="content container-fluid pb-0">
        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Employee</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="modal-title">Edit Employee</h5>
                        </button>
                    </div>

                    <div class="card-body">
                        {{--######################################################## Edit Employee Form
                        ########################################################--}}
                        <form action="{{route('employee.update',$employee->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">
                                            Name <span class="text-danger">*</span></label>
                                        <input value="{{$employee->name}}" name="name" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Phone
                                            <span class="text-danger">*</span></label>
                                        <input value="{{$employee->phone}}" name="phone" class="form-control"
                                            type="tel">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Email
                                            <span class="text-danger">*</span></label>
                                        <input value="{{$employee->email}}" name="email" class="form-control"
                                            type="email">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Password</label>
                                        <input name="password" autofocus="off" class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Confirm
                                            Password</label>
                                        <input class="form-control" autofocus="off" name="repeat_password"
                                            type="password">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee Profile
                                            <span class="text-danger">*</span></label>
                                        <input name="image" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">QR Code
                                            <span class="text-danger">*</span></label>
                                        <input name="qr_code_image" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Address
                                        </label>
                                        <input value="{{$employee->address}}" name="address" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>Designation <span class="text-danger">*</span></label>
                                        <select name="designation" class="form-select"
                                            aria-label="Default select example">
                                            <option>Designation
                                            </option>
                                            <option value="1" @if($employee->
                                                designation
                                                == 1) selected
                                                @endif>Jr.
                                                Developer
                                            </option>
                                            <option value="2" @if($employee->
                                                designation
                                                == 2) selected
                                                @endif>Sr
                                                Developer
                                            </option>
                                            <option value="3" @if($employee->
                                                designation
                                                == 3) selected
                                                @endif>Project
                                                Manager
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Department <span class="text-danger">*</span></label>

                                        <select name="department" class="form-select"
                                            aria-label="Default select example">
                                            <option>Department
                                            </option>
                                            <option value="1" @if($employee->
                                                department
                                                == 1) selected
                                                @endif>Web
                                                Development
                                            </option>
                                            <option value="2" @if($employee->
                                                department
                                                == 2) selected
                                                @endif>Digital
                                                Marketing
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gender<span class="text-danger">*</span></label>
                                        <select name="gender" class="form-select" aria-label="Default select example">
                                            <option selected>Gender
                                            </option>
                                            <option @if($employee->gender
                                                == 1) selected
                                                @endif value="1">Male</option>
                                            <option @if($employee->gender
                                                == 2) selected
                                                @endif value="2">Female</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Role<span class="text-danger">*</span></label>
                                        <select name="role" class="form-select" aria-label="Default select example">
                                            <option selected>Role
                                            </option>
                                            <option value="1" @if($employee->role
                                                == 1) selected
                                                @endif>SuperAdmin
                                            </option>
                                            <option value="2" @if($employee->role
                                                == 2) selected
                                                @endif>Employee
                                            </option>
                                            <option value="3" @if($employee->role
                                                == 3) selected
                                                @endif>Intern
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status<span class="text-danger">*</span></label>
                                        <select name="status" class="form-select" aria-label="Default select example">
                                            <option>Status
                                            </option>
                                            <option value="1" @if($employee->status
                                                == 1) selected
                                                @endif>Active</option>
                                            <option value="2" @if($employee->status
                                                == 2) selected
                                                @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="submit-section">
                                    <button class="btn btn-primary cancel-btn" aria-label="Close">Cancel</button>
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>