@extends('frontend.layout.template')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Leaves</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Leaves</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-info">

                    @php $total_leaves = 0; @endphp

                    @foreach($leaves as $leave)

                    @if(!is_null($leave->day) && Auth::user()->id == $leave->user_id)
                    @php $total_leaves = $total_leaves + $leave->day @endphp
                    @endif

                    @endforeach

                    <h4>
                        @php echo $total_leaves; @endphp
                    </h4>


                    <h6>Annual Leave</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h4>3</h4>
                    <h6>Medical Leave</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h4>4</h4>
                    <h6>Other Leave</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h4>5</h4>
                    <h6>Remaining Leave</h6>
                </div>
            </div>
        </div>


        <div class="row filter-row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="add-emp-section">
                    <a href="#" class="btn btn-success btn-add-emp" data-bs-toggle="modal"
                        data-bs-target="#add_leave"><i class="fas fa-plus"></i> Add Leave</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>From</th>
                                <th>To</th>
                                <th>No of Days</th>
                                <th>Reason</th>
                                <th class="text-center">Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $leave)
                            @if(Auth::user()->id === $leave->user_id)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="" class="avatar">
                                            @if (!is_null(Auth::user()->image))
                                            <img src="{{asset('backend/assets/img/employee/' . Auth::user()->image)}}"
                                                alt="User Image">
                                            @else
                                            <img src="{{asset('backend/assets/img/employee/default_user.jpg')}}"
                                                alt="User Image">
                                            @endif
                                            <a href="#">{{Auth::user()->image}}<span>
                                                    @if(Auth::user()->designation == 1)
                                                    Jr Developer
                                                    @elseif(Auth::user()->designation == 2)
                                                    Sr Developer
                                                    @else
                                                    Project Manager
                                                    @endif
                                                </span></a>
                                    </h2>
                                </td>
                                <td>{{ Carbon\Carbon::parse($leave->from)->format('d-m-y') }}
                                </td>
                                <td>{{ Carbon\Carbon::parse($leave->to)->format('d-m-y') }}</td>
                                <td>{{$leave->day}} Day</td>
                                <td>{{$leave->reason}}</td>
                                <td class="text-center">
                                    @if($leave->status == 1)
                                    <span class="role-info role-bg-three">Panding</span>
                                    @elseif($leave->status == 2)
                                    <span class="role-info role-bg-two">Approved</span>
                                    @elseif($leave->status == 3)
                                    <span class="role-info role-bg-one">Cancelled</span>
                                    @endif
                                </td>

                                @if($leave->status <= 1) <td class="text-end ico-sec">
                                    <a href="{{route('leave.edit', $leave->id)}}"><i class="fas fa-pen"></i></a>
                                    <a data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                            class="far fa-trash-alt"></i></a>
                                    </form>
                                    </td>
                                    @else
                                    <td></td>
                                    @endif
                            </tr>
                            @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- create leave --}}
    <div id="add_leave" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Leave</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row" action="{{route('leave.store')}}" method="POST">
                        @csrf
                        <div class="form-group col-md-6">
                            <label>From <span class="text-danger">*</span></label>
                            <input name="from" value="{{old('from')}}" class="form-control" type="date">
                        </div>
                        <div class="form-group col-md-6">
                            <label>To <span class="text-danger">*</span></label>
                            <input name="to" value="{{old('to')}}" class="form-control" type="date">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Number of days <span class="text-danger">*</span></label>
                            <input name="day" value="{{old('day')}}" class="form-control" type="number">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Leave Reason <span class="text-danger">*</span></label>
                            <textarea name="reason" value="{{old('reason')}}" rows="4" class="form-control"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                        </div>
                        <div class="form-group col-md-12">
                            <input name="status" type="hidden" value="1">
                        </div>

                        <div class="submit-section col-md-12">
                            <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>

                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal custom-modal fade" id="delete_approve" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Leave</h3>
                        <p>Are you sure want to Cancel this leave?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                @foreach($leaves as $leave)
                                <form action="{{route('leave.destroy',$leave->id)}}" method="POST">
                                    @csrf
                                    @endforeach
                                    <input type="submit" name="submit" href="javascript:void(0);" value="Delete"
                                        class="btn btn-primary continue-btn">
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

</div>