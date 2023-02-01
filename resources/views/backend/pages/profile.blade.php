@extends('backend.layout.template')
<div class="page-wrapper">

    <div class="content container-fluid pb-0">
        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Dashboard</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-3 d-flex">
                <div class="card user-card flex-fill">
                    <div class="user-img-sec">
                        @if (!is_null($employee->image))
                        <img src="{{asset('backend/assets/img/employee/' . $employee->image)}}" alt="User Image">
                        @else
                        <img src="{{asset('backend/assets/img/employee/default_user.jpg')}}" alt="User Image">
                        @endif


                        <h4>{{$employee->name}}</h4>
                        <h5>
                            @if($employee->designation == 1)
                            Jr Developer
                            @elseif($employee->designation == 1)
                            Sr Developer
                            @else
                            Project Manager
                            @endif

                        </h5>
                    </div>
                    <div class="card-body">
                        <h4>Joining Date <span>{{$employee->created_at}}</span></h4>
                        <h4>Experience <span>20 years</span></h4>
                        <h4>Employee Number <span>{{$employee->phone}}</span></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-3 d-flex">
                <div class="card user-card flex-fill">
                    <div class="qr-img-sec text-center">
                        @if (!is_null($employee->image))
                        <img width="300px" src="{{asset('backend/assets/img/qr_code/' . $employee->qr_code_image)}}"
                            alt="User Image">
                        @else
                        <img src="{{asset('backend/assets/img/qr_code/qr_code.jpg')}}" alt="User Image">
                        @endif
                    </div>

                </div>
            </div>


            {{-- <div class="col-md-12 col-lg-8 col-xl-6 d-flex">
                <div class="card project-card flex-fill">
                    <h4><i class="fas fa-cube"></i> Projects</h4>
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center">
                            <div id="radialBarChart"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="task-box color-one">
                                        <div class="task-media">
                                            <div class="task-icon">
                                                <img src="{{asset('backend/assets/img/icons/icon-01.png')}}"
                                                    alt="Icons">
                                            </div>
                                            <div class="task-info">
                                                <h5>Pending Tasks</h5>
                                                <h2>55</h2>
                                            </div>
                                        </div>
                                        <div class="task-redirect">
                                            <div class="redirect-icon">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="task-box color-two">
                                        <div class="task-media">
                                            <div class="task-icon">
                                                <img src="{{asset('backend/assets/img/icons/icon-02.png')}}"
                                                    alt="Icons">
                                            </div>
                                            <div class="task-info">
                                                <h5>Completed Tasks</h5>
                                                <h2>55</h2>
                                            </div>
                                        </div>
                                        <div class="task-redirect">
                                            <div class="redirect-icon">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="task-box color-three">
                                        <div class="task-media">
                                            <div class="task-icon">
                                                <img src="{{asset('backend/assets/img/icons/icon-03.png')}}"
                                                    alt="Icons">
                                            </div>
                                            <div class="task-info">
                                                <h5>Total Projects</h5>
                                                <h2>55</h2>
                                            </div>
                                        </div>
                                        <div class="task-redirect">
                                            <div class="redirect-icon">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>


        {{-- <div class="row">
            <div class="col-md-12 col-lg-4 d-flex">
                <div class="card att-card flex-fill">
                    <div class="card-header">
                        <h3><i class="fas fa-user-clock"></i> Attendance</h3>
                        <h4>10:40 AM Jan 2 2021</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Add a note">
                                <button class="btn btn-outline-secondary" type="button">Check in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 d-flex">
                <div class="card att-card flex-fill">
                    <div class="card-header">
                        <h3><i class="fas fa-user-times"></i> Your Leave</h3>
                        <a href="#">Apply Leave</a>
                    </div>
                    <div class="card-body leave-ln">
                        <ul>
                            <li>
                                <h3>25</h3>
                                <h4>Total Leaves</h4>
                            </li>
                            <li>
                                <h3>5</h3>
                                <h4>Remaining Leaves</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 d-flex">
                <div class="card att-card flex-fill">
                    <div class="card-header">
                        <h3><i class="fas fa-user-times"></i> Your Leave</h3>
                        <a href="#">Apply Leave</a>
                    </div>
                    <div class="card-body leave-ln">
                        <ul>
                            <li>
                                <h3>25</h3>
                                <h4>Total Leaves</h4>
                            </li>
                            <li>
                                <h3>5</h3>
                                <h4>Remaining Leaves</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4 col-xl-3 d-flex">
                <div class="card project-card flex-fill">
                    <h4><i class="fab fa-dropbox"></i> Recent Projects</h4>
                    <div class="row">
                        <div class="col-md-12 first-box">
                            <div class="recent-project-box">
                                <div class="circle">
                                    <i class="far fa-image"></i>
                                </div>
                                <h3>DreamsHRMS</h3>
                            </div>
                            <div class="task-progress">
                                <h4>Task Done 50/96</h4>
                                <div class="progress">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="task-avatar mt-2">
                                <div class="avatar-group">
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image"
                                            src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}">
                                    </div>
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image"
                                            src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}">
                                    </div>
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image"
                                            src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}">
                                    </div>
                                </div>
                                <a href="#">View More</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="recent-project-box">
                                <div class="circle">
                                    <i class="far fa-image"></i>
                                </div>
                                <h3>Booking template</h3>
                            </div>
                            <div class="task-progress">
                                <h4>Task Done 50/96</h4>
                                <div class="progress">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="task-avatar mt-2">
                                <div class="avatar-group">
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image"
                                            src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}">
                                    </div>
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image"
                                            src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}">
                                    </div>
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image"
                                            src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}">
                                    </div>
                                </div>
                                <a href="#">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}

        <div class="row">
            {{-- <div class="col-md-12 col-lg-12 col-xl-5 d-flex">
                <div class="card att-card flex-fill">
                    <div class="card-header">
                        <h3><i class="fas fa-calendar-alt"></i> Schedule</h3>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Today</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Tomorow</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false">Next 7 Days</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="tab-content p-0" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <ul class="leave-list">
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}" alt="User">
                                        <p>Richard Miles is off sick today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}" alt="User">
                                        <p>You are away today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}" alt="User">
                                        <p>You are working from home today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}" alt="User">
                                        <p>Richard Miles is off sick today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}" alt="User">
                                        <p>You are away today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-02.jpg')}}" alt="User">
                                        <p>You are working from home today</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <ul class="leave-list">
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-03.jpg')}}" alt="User">
                                        <p>Richard Miles is off sick today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-03.jpg')}}" alt="User">
                                        <p>You are away today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-03.jpg')}}" alt="User">
                                        <p>You are working from home today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-03.jpg')}}" alt="User">
                                        <p>Richard Miles is off sick today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-03.jpg')}}" alt="User">
                                        <p>You are away today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-03.jpg')}}" alt="User">
                                        <p>You are working from home today</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <ul class="leave-list">
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-04.jpg')}}" alt="User">
                                        <p>Richard Miles is off sick today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-04.jpg')}}" alt="User">
                                        <p>You are away today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-04.jpg')}}" alt="User">
                                        <p>You are working from home today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-04.jpg')}}" alt="User">
                                        <p>Richard Miles is off sick today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-04.jpg')}}" alt="User">
                                        <p>You are away today</p>
                                    </li>
                                    <li>
                                        <img src="{{asset('backend/assets/img/profiles/avatar-04.jpg')}}" alt="User">
                                        <p>You are working from home today</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            @if($employee->role > 1) <div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Attendance List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-hover">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                        {{-- <th>IP Address</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($attendances as $attendance )
                                    <tr>
                                        <td>
                                            {{$attendance->created_at->format('d-F-Y')}}
                                        </td>
                                        <td>
                                            @if($employee->id == $attendance->user_id)
                                            {{$attendance->employee_attendance_code}}
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            <h2><a href="#"></a> @if($employee->id == $attendance->user_id)
                                                {{$attendance->created_at->format('h:i:s A')}}
                                                @else
                                                @endif</h2>
                                        </td>

                                        <td>
                                            {{-- <span class="badge bg-inverse-warning"> --}}
                                                @if($employee->id == $attendance->user_id)
                                                {{-- {{$attendance->created_at->format('h:i')}}
                                                --}}
                                                @else
                                                @endif

                                                {{-- </span> --}}
                                        </td>

                                        {{-- <td>@if($employee->id == $attendance->user_id)
                                            {{$attendance->ip_address}}
                                            @else
                                            @endif</td> --}}

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

</div>