@extends('frontend.layout.template')

<div class="page-wrapper" onload="startTime()">
    <div class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Attendance</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="
                                {{url('/employee/dashboard')}}">Dashboard</a></li>
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
                        <h5 class="card-title">Time</h5>
                        <div class="punch-finger">

                        </div>
                        <div class="punch-info text-center">
                            <span style="font-size: 70px;" id="MyClockDisplay" onload="showTime()">12:50</span>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h5 class="card-sub-title">Attendance</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card st-card st-c1">
                                    <div class="stats-info">
                                        <form action="{{route('attendance.store')}}" method="POST">
                                            @csrf
                                            <div class="radio-tile-group">

                                                <div class="input-container">
                                                    <input type="radio" value="{{date('Y-m-d H:i:s')}}" name="time_in">
                                                    <div class="radio-tile">
                                                        <ion-icon name="arrow-down-circle"></ion-icon>
                                                        <label>Punch in</label>
                                                    </div>
                                                </div>

                                                <div class="input-container">
                                                    <input type="radio" value="{{date('Y-m-d H:i:s')}}" name="time_out">
                                                    <div class="radio-tile">
                                                        <ion-icon name="arrow-up-circle"></ion-icon>
                                                        <label>Punch out
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                                            <div class="submit-section col-md-12">
                                                <button class="btn btn-primary submit-btn">Submit</button>
                                            </div>

                                    </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</div>