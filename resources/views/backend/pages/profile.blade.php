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
                            intern
                            @endif

                        </h5>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                <a class="dropdown-item" href="{{route('employee.edit',$employee->id)}}">Edit</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4>Joining Date <span>{{$employee->created_at->format('d-F-Y')}}</span></h4>
                        <h4>Email <span>{{$employee->email}}</span></h4>
                        <h4>Phone <span>{{$employee->phone}}</span></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-3 d-flex">
                <div class="card user-card flex-fill">

                </div>
            </div>


            <div class="col-md-12 col-lg-8 col-xl-6 d-flex">
                <div class="card project-card flex-fill">

                </div>
            </div>

        </div>




        <div class="row">


            @if($employee->role > 1)
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group mb-0">
                                <input id="min" name="min" type="text" class="form-control" placeholder="From">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group mb-0">
                                <input id="max" name="max" type="text" class="form-control" placeholder="to">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 table-responsive">
                        <table id="example" class="table-hover table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
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
                                        {{ Carbon\Carbon::parse($attendance->time)->format('h:i:s A')}}
                                        @endif
                                    </td>

                                    <td>
                                        @if($employee->id == $attendance->user_id)
                                        {{$attendance->attendance_status}}
                                        @endif

                                    </td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @endif

        </div>
    </div>

</div>