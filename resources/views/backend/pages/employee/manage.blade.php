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
                <div class="row filter-row">
                        <div class="col-md-10">
                                <div class="row">
                                        <div class="col-sm-6 col-md-12">
                                                <div class="form-group mb-0">
                                                        <input id="" type="text" class="form-control"
                                                                placeholder="Employee Name Search">
                                                </div>
                                        </div>

                                </div>
                        </div>
                        <div class="col-md-2">
                                <div class="add-emp-section">
                                        <a href="#" class="btn btn-success btn-add-emp" data-bs-toggle="modal"
                                                data-bs-target="#add_employee"><i class="fas fa-plus"></i> Add
                                                Employee</a>
                                </div>
                        </div>
                </div>

                <div class="row">
                        @foreach ($employees as $employee)
                        @if($employee->role > 1)
                        <div class="col-md-4 col-lg-4 col-xl-3">
                                <div class="card user-card emp-card">
                                        <div class="user-img-sec">
                                                @if (!is_null($employee->image))
                                                <img src="{{asset('backend/assets/img/employee/' . $employee->image)}}"
                                                        alt="User Image">
                                                @else
                                                <img src="{{asset('backend/assets/img/employee/default_user.jpg')}}"
                                                        alt="User Image">
                                                @endif
                                                <h4>{{$employee->name}}</h4>
                                                <h5>
                                                        @if($employee->designation == 1)
                                                        Sr. WordPress Developer
                                                        @elseif($employee->designation == 2)
                                                        Jr. Wordpress Developer
                                                        @elseif($employee->designation == 3)
                                                        Expert Wordpress Developer
                                                        @elseif($employee->designation == 4)
                                                        Shopify Expert
                                                        @elseif($employee->designation == 5)
                                                        PHP & Laravel Expert
                                                        @elseif($employee->designation == 6)
                                                        JavaScript Developer
                                                        @elseif($employee->designation == 7)
                                                        Social Media Marketer
                                                        @else
                                                        WordPress Learner
                                                        @endif
                                                </h5>
                                                <h6 class="bg-1">
                                                        @if($employee->department == 1)
                                                        Web Development
                                                        @elseif($employee->department == 2)
                                                        Digital Marketing
                                                        @else
                                                        @endif
                                                </h6>



                                                <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item"
                                                                        href="{{route('employee.edit',$employee->id)}}">Edit</a>

                                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                                        data-bs-target="#delete_employee{{$employee->id}}">Delete</a>
                                                        </div>
                                                </div>


                                                <div class="comment-sec">
                                                        <i class="fas fa-comment-dots"></i>
                                                </div>
                                        </div>
                                        <div class="card-body pb-0">
                                                <h4>Employee ID <span>FT-{{$employee->id}}</span></h4>
                                                <h4>Date of Join <span>{{$employee->created_at->format('d-F-Y')}}</span>
                                                </h4>
                                        </div>
                                        <div class="card-footer">
                                                <a href="{{route('view.employee.profile',$employee->id)}}">View
                                                        Profile</a>
                                        </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                </div>
        </div>
        {{-- Add Modal --}}
        <div id="add_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title">Add Employee</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times"></i>
                                        </button>
                                </div>
                                <div class="modal-body">
                                        {{--######################################################## Create Employee
                                        Form ########################################################--}}
                                        <form action="{{route('employee.store')}}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                        <div class="col-sm-4">
                                                                <div class="form-group">
                                                                        <label class="col-form-label">
                                                                                Name <span
                                                                                        class="text-danger">*</span></label>
                                                                        <input value="{{old('name')}}" name="name"
                                                                                class="form-control" type="text">
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                                <div class="form-group">
                                                                        <label class="col-form-label">Phone</label>
                                                                        <input value="{{old('phone')}}" name="phone"
                                                                                class="form-control" type="tel">
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                                <div class="form-group">
                                                                        <label class="col-form-label">Email</label>
                                                                        <input value="{{old('email')}}" name="email"
                                                                                class="form-control" type="email">
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                                <div class="form-group">
                                                                        <label class="col-form-label">Password</label>
                                                                        <input name="password" class="form-control"
                                                                                type="password">
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                                <div class="form-group">
                                                                        <label class="col-form-label">Confirm
                                                                                Password</label>
                                                                        <input class="form-control"
                                                                                name="repeat_password" type="password">
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                                <div class="form-group">
                                                                        <label class="col-form-label">Employee
                                                                                Profile</label>
                                                                        <input value="{{old('image')}}" name="image"
                                                                                type="file" class="form-control">
                                                                </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                                <div class="form-group">
                                                                        <label class="col-form-label">Address</label>
                                                                        <input value="{{old('address')}}" name="address"
                                                                                class="form-control" type="text">
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-4">

                                                                <div class="form-group">
                                                                        <label>Designation <span
                                                                                        class="text-danger">*</span></label>

                                                                        <select name="designation" class="form-select"
                                                                                aria-label="Default select example">
                                                                                <option selected>Designation
                                                                                </option>
                                                                                <option value="1">Sr. WordPress
                                                                                        Developer</option>
                                                                                <option value="2">Jr. Wordpress
                                                                                        Developer</option>
                                                                                <option value="3">Expert Wordpress
                                                                                        Developer
                                                                                </option>
                                                                                </option>
                                                                                <option value="4">Shopify Expert
                                                                                </option>
                                                                                <option value="5">PHP & Laravel
                                                                                        Expert</option>
                                                                                <option value="6">JavaScript Developer
                                                                                </option>
                                                                                <option value="7">Social Media Marketer

                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                        <label>Department <span
                                                                                        class="text-danger">*</span></label>

                                                                        <select name="department" class="form-select"
                                                                                aria-label="Default select example">
                                                                                <option selected>Department
                                                                                </option>
                                                                                <option value="1">Web
                                                                                        Development
                                                                                </option>
                                                                                <option value="2">Digital Marketing
                                                                                </option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                        <label>Gender<span
                                                                                        class="text-danger">*</span></label>
                                                                        <select name="gender" class="form-select"
                                                                                aria-label="Default select example">
                                                                                <option selected>Designation
                                                                                </option>
                                                                                <option value="1">Male</option>
                                                                                <option value="2">Female</option>
                                                                        </select>

                                                                </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                        <label>Role<span
                                                                                        class="text-danger">*</span></label>
                                                                        <select name="role" class="form-select"
                                                                                aria-label="Default select example">
                                                                                <option selected>Role
                                                                                </option>
                                                                                <option value="1">SuperAdmin
                                                                                </option>
                                                                                <option value="2">Employee
                                                                                </option>
                                                                                <option value="3">Intern
                                                                                </option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                        <label>Status<span
                                                                                        class="text-danger">*</span></label>
                                                                        <select name="status" class="form-select"
                                                                                aria-label="Default select example">
                                                                                <option selected>Status
                                                                                </option>
                                                                                <option value="1">Active</option>
                                                                                <option value="2">Inactive</option>
                                                                        </select>
                                                                </div>
                                                        </div>




                                                </div>
                                                <div class="submit-section">
                                                        <button class="btn btn-primary cancel-btn"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close">Cancel</button>
                                                        <button type="submit"
                                                                class="btn btn-primary submit-btn">Submit</button>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>


        {{-- delete modal --}}

        @foreach ($employees as $employee)


        <div class="modal custom-modal fade" id="delete_employee{{$employee->id}}" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                                <div class="modal-body">
                                        <div class="form-header">
                                                <h3>Delete Employee</h3>
                                                <p>Are you sure want to delete?</p>
                                        </div>
                                        <div class="modal-btn delete-action">
                                                <div class="row">
                                                        <div class="col-6">
                                                                {{--########################################################
                                                                Delete Employee Form
                                                                ########################################################--}}
                                                                <form action="{{route('employee.destroy',$employee->id)}}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="submit" name="delete"
                                                                                class="btn btn-primary continue-btn"
                                                                                value="Delete">
                                                                </form>
                                                        </div>
                                                        <div class="col-6">
                                                                <a href="javascript:void(0);" data-bs-dismiss="modal"
                                                                        class="btn btn-primary cancel-btn">Cancel</a>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        @endforeach
</div>