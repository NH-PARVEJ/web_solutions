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
                        <div class="col-lg-12">
                                <div class="table-responsive att-table">
                                        <table class="table table-striped custom-table table-nowrap mb-0">
                                                <thead>
                                                        <tr>
                                                                <th>Employee</th>
                                                                <th>1</th>
                                                                <th>2</th>
                                                                <th>3</th>
                                                                <th>4</th>
                                                                <th>5</th>
                                                                <th>6</th>
                                                                <th>7</th>
                                                                <th>8</th>
                                                                <th>9</th>
                                                                <th>10</th>
                                                                <th>11</th>
                                                                <th>12</th>
                                                                <th>13</th>
                                                                <th>14</th>
                                                                <th>15</th>
                                                                <th>16</th>
                                                                <th>17</th>
                                                                <th>18</th>
                                                                <th>19</th>
                                                                <th>20</th>
                                                                <th>22</th>
                                                                <th>23</th>
                                                                <th>24</th>
                                                                <th>25</th>
                                                                <th>26</th>
                                                                <th>27</th>
                                                                <th>28</th>
                                                                <th>29</th>
                                                                <th>30</th>
                                                                <th>31</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                                <td>
                                                                        <h2 class="table-avatar">
                                                                                <a class="avatar"
                                                                                        href="profile.html"><img alt=""
                                                                                                src="assets/img/profiles/avatar-09.jpg"></a>
                                                                                <a href="profile.html">John Doe</a>
                                                                        </h2>
                                                                </td>
                                                                <td><a href="javascript:void(0);" data-bs-toggle="modal"
                                                                                data-bs-target="#attendance_info"><i
                                                                                        class="fa fa-check text-success"></i></a>
                                                                </td>
                                                                <td><i class="fas fa-times text-danger"></i> </td>
                                                        </tr>


                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>
        </div>
        <div class="modal custom-modal fade" id="attendance_info" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title">Attendance Info</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times"></i>
                                        </button>
                                </div>
                                <div class="modal-body">
                                        <div class="row">
                                                <div class="col-md-6">
                                                        <div class="card punch-status">
                                                                <div class="card-body">
                                                                        <h5 class="card-title">Timesheet <small
                                                                                        class="text-muted">11 Mar
                                                                                        2019</small>
                                                                        </h5>
                                                                        <div class="punch-det">
                                                                                <h6>Punch In at</h6>
                                                                                <p>Wed, 11th Mar 2019 10.00 AM</p>
                                                                        </div>
                                                                        <div class="punch-info">
                                                                                <div class="punch-hours">
                                                                                        <span>3.45 hrs</span>
                                                                                </div>
                                                                        </div>
                                                                        <div class="punch-det">
                                                                                <h6>Punch Out at</h6>
                                                                                <p>Wed, 20th Feb 2019 9.00 PM</p>
                                                                        </div>
                                                                        <div class="statistics">
                                                                                <div class="row">
                                                                                        <div
                                                                                                class="col-md-6 col-6 text-center">
                                                                                                <div class="stats-box">
                                                                                                        <p>Break</p>
                                                                                                        <h6>1.21 hrs
                                                                                                        </h6>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div
                                                                                                class="col-md-6 col-6 text-center">
                                                                                                <div class="stats-box">
                                                                                                        <p>Overtime</p>
                                                                                                        <h6>3 hrs</h6>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="card recent-activity">
                                                                <div class="card-body">
                                                                        <h5 class="card-title">Activity</h5>
                                                                        <ul class="res-activity-list">
                                                                                <li>
                                                                                        <p class="mb-0">Punch In at</p>
                                                                                        <p class="res-activity-time">
                                                                                                <i
                                                                                                        class="far fa-clock"></i>
                                                                                                10.00 AM.
                                                                                        </p>
                                                                                </li>
                                                                                <li>
                                                                                        <p class="mb-0">Punch Out at</p>
                                                                                        <p class="res-activity-time">
                                                                                                <i
                                                                                                        class="far fa-clock"></i>
                                                                                                11.00 AM.
                                                                                        </p>
                                                                                </li>
                                                                                <li>
                                                                                        <p class="mb-0">Punch In at</p>
                                                                                        <p class="res-activity-time">
                                                                                                <i
                                                                                                        class="far fa-clock"></i>
                                                                                                11.15 AM.
                                                                                        </p>
                                                                                </li>
                                                                                <li>
                                                                                        <p class="mb-0">Punch Out at</p>
                                                                                        <p class="res-activity-time">
                                                                                                <i
                                                                                                        class="far fa-clock"></i>
                                                                                                1.30 PM.
                                                                                        </p>
                                                                                </li>
                                                                                <li>
                                                                                        <p class="mb-0">Punch In at</p>
                                                                                        <p class="res-activity-time">
                                                                                                <i
                                                                                                        class="far fa-clock"></i>
                                                                                                2.00 PM.
                                                                                        </p>
                                                                                </li>
                                                                                <li>
                                                                                        <p class="mb-0">Punch Out at</p>
                                                                                        <p class="res-activity-time">
                                                                                                <i
                                                                                                        class="far fa-clock"></i>
                                                                                                7.30 PM.
                                                                                        </p>
                                                                                </li>
                                                                        </ul>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>