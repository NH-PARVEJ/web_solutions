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




                            
                <div class="row">
                        <div class="col-md-12">
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
                                        <table  id="example" class="table-responsive table-hover table table-striped table-bordered"
                                        style="width:100%">
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
                                                        @foreach ($leaves as $leave)
                                                        @if($employee->id == $leave->user_id)
                                                                <tr>
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
                                                                        
                                                                </tr>
                                                        @endif
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
                                                                <form action="{{route('leave.admin_destroy',$leave->id)}}"
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