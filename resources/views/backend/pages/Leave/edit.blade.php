@extends('backend.layout.template')
<div class="page-wrapper">
    <div class="content container-fluid pb-0">
        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Employee</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee
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
                        <h5 class="modal-title">Edit Leave</h5>
                        </button>
                    </div>

                    <div class="card-body">
                        {{--######################################################## Edit Employee Form
                        ########################################################--}}
                        <form class="row" action="{{route('leave.admin_update', $leave->id)}}" method="POST">
                            @csrf
                            <div class="form-group col-md-6">
                                <label>From <span class="text-danger">*</span></label>
                                <input name="from" value="{{$leave->from}}" class="form-control" type="date">
                            </div>
                            <div class="form-group col-md-6">
                                <label>To <span class="text-danger">*</span></label>
                                <input name="to" value="{{$leave->to}}" class="form-control" type="date">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Number of days <span class="text-danger">*</span></label>
                                <input name="day" value="{{$leave->day}}" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <label>status</label>
                                <select name="status" class="form-control" id="">
                                    <option @if($leave->status == 1) selected @endif value="1">Panding</option>
                                    <option @if($leave->status == 2) selected @endif value="2">Approved</option>
                                    <option @if($leave->status == 3) selected @endif value="3">Cancelled</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea name="reason" rows="4" class="form-control">{{$leave->reason}}</textarea>
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
    </div>
</div>