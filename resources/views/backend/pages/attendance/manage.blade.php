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

                <div class="row">
                        <div class="col-md-12">
                                <div class="table-responsive">
                                        <table class="table table-hover table-striped custom-table mb-0 datatable">
                                                <thead>
                                                        <tr>
                                                                <th>Date</th>
                                                                <th>Employee</th>
                                                                <th>In Time</th>
                                                                <th>authorization</th>
                                                                <th>Oute Time</th>
                                                                <th>IP Address</th>

                                                        </tr>
                                                </thead>

                                                @php $i = 1; @endphp
                                                <tbody>

                                                        @foreach($employees as $employee)
                                                        <tr>
                                                        </tr>


                                                        @foreach($employee_attendance as $attendance)
                                                        <tr>

                                                                <td>{{$attendance->created_at->format('d-F-Y')}}</td>
                                                                <td>
                                                                        <h2 class="table-avatar">
                                                                                <a href="#" class="avatar">
                                                                                        @if (!is_null($employee->image))
                                                                                        <img src="{{asset('backend/assets/img/employee/' . $employee->image)}}"
                                                                                                alt="User Image">
                                                                                        @else
                                                                                        <img src="{{asset('backend/assets/img/employee/default_user.jpg')}}"
                                                                                                alt="User Image">
                                                                                        @endif
                                                                                </a>
                                                                                <a href="#">{{$employee->name}}
                                                                                        <span>
                                                                                                @if($employee->designation
                                                                                                == 1)
                                                                                                Jr Developer
                                                                                                @elseif($employee->designation
                                                                                                == 2)
                                                                                                Sr Developer
                                                                                                @elseif($employee->designation
                                                                                                == 3)
                                                                                                Sr Developer
                                                                                                @else
                                                                                                @endif
                                                                                        </span>
                                                                                </a>
                                                                        </h2>
                                                                </td>


                                                                <td>
                                                                        @if($employee->id == $attendance->user_id)
                                                                        {{$attendance->created_at->format('h:i:s A')}}
                                                                        @else
                                                                        <div
                                                                                class="text-light rounded text-center bg-danger">
                                                                                <span>Absent</span>
                                                                        </div>
                                                                        {{-- <i class="fas fa-times text-danger"></i>
                                                                        --}}
                                                                        @endif
                                                                </td>



                                                                <td>
                                                                        @if($employee->id == $attendance->user_id)
                                                                        {{$attendance->employee_attendance_code}}
                                                                        @else
                                                                        @endif
                                                                </td>

                                                                <td>
                                                                        @if($employee->id == $attendance->user_id)
                                                                        {{-- {{$attendance->created_at->format('h:i')}}
                                                                        --}}
                                                                        {{-- <i class="fas fa-times text-danger"></i>
                                                                        --}}
                                                                        @else
                                                                        @endif
                                                                </td>
                                                                <td>
                                                                        @if($employee->id == $attendance->user_id)
                                                                        {{$attendance->ip_address}}
                                                                        @else
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
</div>