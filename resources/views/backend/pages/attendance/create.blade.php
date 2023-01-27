@extends('backend.layout.template')

<div class="page-wrapper" onload="startTime()">
    <div class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Attendance</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 d-flex">
                <div class="card punch-status flex-fill">
                    <div class="card-body">
                        <h5 class="card-title">Timesheet</h5>
                        <div class="punch-finger">
                            <i class="fas fa-fingerprint"></i>
                            <div class="punch-det">
                                <h6>Punch In at</h6>
                                <p id="date"></p>
                            </div>
                        </div>
                        <div class="punch-info">
                            <div class="punch-hours">
                                <span style="font-size: 15px;" id="MyClockDisplay" onload="showTime()">12:50</span>
                            </div>
                        </div>
                        <div class="punch-btn-section">

                            <span>Punch in</span>
                            <div class="onoffswitch">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                    id="switch_annual" checked>
                                <label class="onoffswitch-label" for="switch_annual">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                            <span>Punch out</span>

                        </div>
                        <div class="statistics">
                            <ul>
                                <li>
                                    <div class="stats-box">
                                        <p>Break</p>
                                        <h6>1.21 hrs</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="stats-box">
                                        <p>Overtime</p>
                                        <h6>3 hrs</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h5 class="card-sub-title">Statistics</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card st-card st-c1">
                                    <div class="stats-info">
                                        <div>
                                            <p>Today</p>
                                            <h5>3.45 / 8 hrs</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%"
                                                aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card st-card st-c2">
                                    <div class="stats-info">
                                        <div>
                                            <p>This Week</p>
                                            <h5>3.45 / 8 hrs</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 47%"
                                                aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card st-card st-c3">
                                    <div class="stats-info">
                                        <div>
                                            <p>This month</p>
                                            <h5>3.45 / 8 hrs</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 87%"
                                                aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card st-card st-c4">
                                    <div class="stats-info">
                                        <div>
                                            <p>Remaining</p>
                                            <h5>3.45 / 8 hrs</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 87%"
                                                aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card st-card st-c5">
                                    <div class="stats-info">
                                        <div>
                                            <p>Overtime</p>
                                            <h5>4</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 57%"
                                                aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h5 class="card-sub-title">QR Code Scanner</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card st-card st-c1">
                                    <div class="stats-info">
                                        <video style="border-radius:10px;" width="100%" id="MyCameraOpen"></video>
                                        @foreach($users as $user)

                                        <form action="{{route('attendance.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="employee_attendance_code" readonly
                                                id="employee_id" class=" mt-5 from-control">
                                            <input type="hidden" name="user_id" value="{{$user->id}}" readonly
                                                id="employee_id" class=" mt-5 from-control">
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card st-card st-c1">
                                    <div class="stats-info">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card st-card st-c5">
                                    <div class="stats-info">
                                        <div>
                                            <p>Overtime</p>
                                            <h5>4</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 57%"
                                                aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable att-emp-table">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Name</th>
                                <th>Punch In</th>
                                <th>Scan Value</th>
                                <th>Punch Out</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach ($employee_attendance as $attendance)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if(Auth::check()) {{Auth::user()->name}} @endif
                                </td>
                                <td>{{$attendance->created_at}}</td>
                                <td>{{$attendance->employee_name}}</td>
                                <td>{{$attendance->time_out}}</td>
                                <td>{{$attendance->ip_address}}</td>
                                @php $i++; @endphp
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>