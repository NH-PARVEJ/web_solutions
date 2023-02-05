@extends('frontend.layout.template')
<div class="page-wrapper">

    <div class="content container-fluid pb-0">
        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Dashboard</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/employee/dashboard')}}">Dashboard</a></li>
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
                            Intern
                            @endif

                        </h5>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                <a class="dropdown-item"
                                    href="{{route('employee.profile.edit',$employee->id)}}">Edit</a>
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
                    <h4><i class="fas fa-cube"></i> Projects</h4>
                    <div class="row">



                    </div>
                </div>
            </div>

        </div>




        <div class="row">

            <div class="table-responsive">
                <table class=" table-hover table table-striped custom-table mb-0 datatable dataTable no-footer"
                    id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>In Time</th>
                            <th>Out Time</th>
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
                                @if(!is_null($attendance->time_in))
                                {{ Carbon\Carbon::parse($attendance->time_in)->format('h:i:s A')}}
                                @else
                                @endif
                                @endif
                            </td>

                            <td>
                                @if($employee->id == $attendance->user_id)
                                @if(!is_null($attendance->time_out))
                                {{ Carbon\Carbon::parse($attendance->time_out)->format('h:i:s A')}}
                                @else
                                @endif
                                @endif

                            </td>


                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>