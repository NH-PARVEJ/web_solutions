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
                                                                        href="{{route('admin.dashboard')}}">Dashboard</a>
                                                        </li>
                                                        <li class="breadcrumb-item active" aria-current="page">
                                                                Attendance
                                                        </li>
                                                </ol>
                                        </nav>
                                </div>
                        </div>
                </div>


                <div class="card">
                        <div class="card-header">

                                <div class="row">
                                        <div class="col-sm-6 col-md-3">
                                                <div class="form-group mb-0">
                                                        <input id="min" name="min" type="text" class="form-control"
                                                                placeholder="From">
                                                </div>
                                        </div>

                                        <div class="col-sm-6 col-md-3">
                                                <div class="form-group mb-0">
                                                        <input id="max" name="max" type="text" class="form-control"
                                                                placeholder="to">
                                                </div>
                                        </div>
                                </div>

                                <div class=" mt-3 table-responsive">
                                        <table id="example" class="table-hover table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                        <tr>

                                                                <th>Employee</th>
                                                                <th>Date</th>
                                                                <th>Time</th>
                                                                <th>Status</th>
                                                                <th>IP Address</th>

                                                        </tr>
                                                </thead>

                                                @php $i = 1; @endphp
                                                <tbody>

                                                        @foreach($employees as $employee)

                                                        @foreach($employee_attendance as $attendance)
                                                        <tr>
                                                                <td>
                                                                        <h2 class="table-avatar">
                                                                                <a class="avatar">
                                                                                        @if (!is_null($employee->image))
                                                                                        <img src="{{asset('backend/assets/img/employee/' . $employee->image)}}"
                                                                                                alt="User Image">
                                                                                        @else
                                                                                        <img src="{{asset('backend/assets/img/employee/default_user.jpg')}}"
                                                                                                alt="User Image">
                                                                                        @endif
                                                                                </a>
                                                                                <a>{{$employee->name}}
                                                                                        <span>
                                                                                                @if($employee->designation
                                                                                                == 1)
                                                                                                Sr. WordPress Developer
                                                                                                @elseif($employee->designation
                                                                                                == 2)
                                                                                                Jr. Wordpress Developer
                                                                                                @elseif($employee->designation
                                                                                                == 3)
                                                                                                Expert Wordpress
                                                                                                Developer
                                                                                                @elseif($employee->designation
                                                                                                == 4)
                                                                                                Shopify Expert
                                                                                                @elseif($employee->designation
                                                                                                == 5)
                                                                                                PHP & Laravel Expert
                                                                                                @elseif($employee->designation
                                                                                                == 6)
                                                                                                JavaScript Developer
                                                                                                @elseif($employee->designation
                                                                                                == 7)
                                                                                                Social Media Marketer
                                                                                                @else
                                                                                                intern
                                                                                                @endif
                                                                                        </span>
                                                                                </a>
                                                                        </h2>
                                                                </td>
                                                                <td>{{$attendance->created_at->format('d-F-Y')}}</td>


                                                                <td>
                                                                        @if($employee->id == $attendance->user_id)
                                                                        {{
                                                                        Carbon\Carbon::parse($attendance->time)->format('h:i:s
                                                                        A')}}
                                                                        @else
                                                                        @endif
                                                                </td>

                                                                <td>
                                                                        @if($employee->id == $attendance->user_id)
                                                                        {{$attendance->attendance_status}}
                                                                        @endif
                                                                </td>
                                                                <td>
                                                                        @if($employee->id == $attendance->user_id)
                                                                        {{$attendance->ip_address}}
                                                                        @endif

                                                                </td>



                                                        </tr>
                                                        @endforeach
                                                        @endforeach
                                                </tbody>

                                        </table>

                                </div>

                        </div>
                </div>
        </div>