@extends('backend.layout.template')
<div class="page-wrapper">
        <div class="content container-fluid">
                <div class="row">
                        <div class="col-md-12">
                                <div class="page-head-box">
                                        <h3>Leaves</h3>
                                        <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a
                                                                        href="admin-dashboard.html">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Leaves
                                                        </li>
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

                                        @php $total_leaves = $total_leaves + $leave->day @endphp

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
                <div class="row">
                        <div class="col-md-12">
                                <div class="table-responsive">
                                        <table class="table table-hover table-striped custom-table mb-0 datatable">
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
                                                        @foreach ($employees as $employee)
                                                        <tr>
                                                        </tr>


                                                        @foreach ($leaves as $leave)
                                                        <tr>

                                                                @if($employee->id == $leave->user_id)
                                                                <td>
                                                                        <h2 class="table-avatar">
                                                                                <a href="" class="avatar">
                                                                                        @if (!is_null($employee->image))
                                                                                        <img src="{{asset('backend/assets/img/employee/' . $employee->image)}}"
                                                                                                alt="User Image">
                                                                                        @else
                                                                                        <img src="{{asset('backend/assets/img/employee/default_user.jpg')}}"
                                                                                                alt="User Image">
                                                                                        @endif
                                                                                        <a href="#">{{$employee->name}}<span>
                                                                                                        @if($employee->designation
                                                                                                        == 1)
                                                                                                        Jr Developer
                                                                                                        @elseif($employee->designation
                                                                                                        == 2)
                                                                                                        Sr Developer
                                                                                                        @else
                                                                                                        Project Manager
                                                                                                        @endif
                                                                                                </span></a>
                                                                        </h2>
                                                                </td>

                                                                <td>{{ Carbon\Carbon::parse($leave->from)->format('d-m-y')}}
                                                                </td>
                                                                <td>{{ Carbon\Carbon::parse($leave->to)->format('d-m-y')
                                                                        }}
                                                                </td>
                                                                <td>{{$leave->day}} Day</td>
                                                                <td>{{$leave->reason}}</td>
                                                                <td class="text-center">
                                                                        @if($leave->status == 1)
                                                                        <span
                                                                                class="role-info role-bg-three">Panding</span>
                                                                        @elseif($leave->status == 2)
                                                                        <span
                                                                                class="role-info role-bg-two">Approved</span>
                                                                        @elseif($leave->status == 3)
                                                                        <span
                                                                                class="role-info role-bg-one">Cancelled</span>
                                                                        @endif
                                                                </td>
                                                                <td class="text-end ico-sec">
                                                                        <a
                                                                                href="{{route('leave.admin_edit', $leave->id)}}"><i
                                                                                        class="fas fa-pen"></i></a>
                                                                        <a data-bs-toggle="modal"
                                                                                data-bs-target="#delete_approve"><i
                                                                                        class="far fa-trash-alt"></i></a>
                                                                        </form>
                                                                </td>
                                                                @endif
                                                        </tr>
                                                        @endforeach
                                                        @endforeach
                                                </tbody>
                                        </table>
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
                                                                <form action="{{route('leave.destroy',$leave->id)}}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @endforeach
                                                                        <input type="submit" name="submit"
                                                                                href="javascript:void(0);"
                                                                                value="Delete"
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