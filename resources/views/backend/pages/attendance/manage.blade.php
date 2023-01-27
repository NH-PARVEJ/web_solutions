@extends('backend.layout.template')
<div class="page-wrapper">
        <div class="content container-fluid">
                <div class="row">
                        <div class="col-md-12">
                                <div class="page-head-box">
                                        <h3>Attendance</h3>
                                        <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a
                                                                        href="admin-dashboard.html">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">
                                                                Attendance
                                                        </li>
                                                </ol>
                                        </nav>
                                </div>
                        </div>
                </div>

                <div class="row">
                        <div class="col-md-12">
                                <div class="table-responsive">
                                        <table class="table table-hover table-striped custom-table mb-0 datatable">
                                                <thead>
                                                        <tr>
                                                                <th>Date</th>
                                                                <th>Employee</th>
                                                                <th>In Time</th>
                                                                <th>Oute Time</th>
                                                                <th>IP Address</th>

                                                        </tr>
                                                </thead>

                                                @php $i = 1; @endphp
                                                <tbody>

                                                        @foreach($users as $user)
                                                        <tr>
                                                                <td>Date</td>
                                                                <td>
                                                                        <h2 class="table-avatar">
                                                                                <a href="#" class="avatar">
                                                                                        @if(!is_null($user->image))
                                                                                        <img alt=""
                                                                                                src="{{asset('backend/assets/img/'.$user->image)}}">
                                                                                        @else
                                                                                        <img alt=""
                                                                                                src="{{asset('backend/assets/img/employee/default_user.jpg')}}">
                                                                                        @endif
                                                                                </a>
                                                                                <a href="#">{{$user->name}}<span>Web
                                                                                                Developer</span></a>
                                                                        </h2>
                                                                </td>
                                                                <td>In Time</td>
                                                                <td>Oute Time</td>
                                                                <td>IP Address</td>
                                                        </tr>


                                                        @foreach($employee_attendance as $attendance)
                                                        <tr>
                                                                <td>@php echo date('M-Y'); @endphp</td>
                                                                <td></td>
                                                                <td>{{$attendance->time_in}}</td>
                                                                <td>{{$attendance->time_out}}</td>
                                                                <td>{{$attendance->ip_address}}</td>
                                                        </tr>
                                                        @endforeach
                                                        @endforeach
                                                </tbody>

                                        </table>

                                </div>
                        </div>
                </div>

        </div>
</div>