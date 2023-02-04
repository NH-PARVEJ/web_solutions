<div class="sidebar-right">
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
            aria-labelledby="v-pills-dashboard-tab">
            <ul>
                <li>
                    <a href="{{route('admin.dashboard')}}" class="active">Dashboard</a>
                </li>
            </ul>
        </div>

        <div class="tab-pane fade" id="v-pills-employees" role="tabpanel" aria-labelledby="v-pills-employees-tab">
            <p>Employee</p>
            <ul>
                <li><a href="{{route('employee.manage')}}">All Employees</a></li>
                <li><a href="{{route('leave.manage')}}">Employee Leave<span
                            class="badge rounded-pill bg-primary float-end">1</span></a></li>
                <li><a href="{{route('attendance.manage')}}">Attendance</a></li>

            </ul>
        </div>

        <div class="tab-pane fade" id="v-pills-projects" role="tabpanel" aria-labelledby="v-pills-projects-tab">
            <p>Projects</p>
            <ul>
                <li><a href="projects.html">Projects</a></li>
                <li><a href="tasks.html">Tasks</a></li>
                <li><a href="task-board.html">Task Board</a></li>
            </ul>
        </div>

        <div class="tab-pane fade" id="v-pills-payroll" role="tabpanel" aria-labelledby="v-pills-payroll-tab">
            <p>Payroll</p>
            <ul>
                <li><a href="salary.html"> Employee Salary </a></li>
                <li><a href="salary-view.html"> Payslip </a></li>
                <li><a href="payroll-items.html"> Payroll Items </a></li>
            </ul>
        </div>



        <div class="tab-pane fade" id="v-pills-accounting" role="tabpanel" aria-labelledby="v-pills-payroll-tab">
            <p>Payroll</p>
            <ul>
                <li><a href="{{route('expance.manage')}}">Office Expense</a></li>
                <li><a href="salary-view.html"> </a></li>
            </ul>
        </div>

    </div>
</div>