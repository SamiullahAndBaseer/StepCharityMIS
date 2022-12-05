<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="/dashboard">
                        <img src="{{ asset('assets/src/assets/img/logo.png') }}" class="navbar-logo" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="/dashboard" class="nav-link"> SCEO </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ Request::is('dashboard') || Request::is('chatify') ? 'active' : '' }}"">
                <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('dashboard') ? 'recent-submenu' : '' }}" id="dashboard" data-bs-parent="#accordionExample">
                    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <a href="/dashboard"> Analytics </a>
                    </li>
                    <li class="{{ Request::is('chatify') ? 'active' : '' }}">
                        <a href="/chatify"> Messenger </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>HR Section</span></div>
            </li>

            <li class="menu {{ Request::is('user/*') || Request::is('single-user/*') || Request::is('user/create') || Request::is('user') ? 'active' : '' }}">
                <a href="#users" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Employees</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('user/create') || Request::is('user') ? 'recent-submenu' : '' }}" id="users" data-bs-parent="#accordionExample">
                    <li class="{{ Request::is('user/create') ? 'active' : '' }}">
                        <a href="{{ route('user.create') }}"> Add Employee </a>
                    </li>
                    <li class="{{ Request::is('user/*') || Request::is('single-user/*') || Request::is('user') ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}"> Employees List </a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ Request::is('teacher/*') || Request::is('teacher') ? 'active' : '' }}">
                <a href="#teachers" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Teachers</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('teacher/create') || Request::is('teacher') ? 'recent-submenu' : '' }}" id="teachers" data-bs-parent="#accordionExample">
                    <li  class="{{ Request::is('teacher/create') ? 'active' : '' }}">
                        <a href="{{ route('teacher.create') }}"> Add Teacher </a>
                    </li>
                    <li  class="{{ Request::is('teacher') ? 'active' : '' }}">
                        <a href="{{ route('teacher.index') }}"> Teachers List </a>
                    </li>
                </ul>
            </li>
            <li class="menu {{ Request::is('graduated') || Request::is('st-attend-setting/*') || Request::is('st-attend-setting') || Request::is('student/*') || Request::is('student') ? 'active' : '' }}">
                <a href="#students" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Students</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('st-attend-setting') || Request::is('student/create') || Request::is('student') ? 'recent-submenu' : '' }}" id="students" data-bs-parent="#accordionExample">
                    <li class="{{ Request::is('student/create') ? 'active' : '' }}">
                        <a href="{{ route('student.create') }}"> Add Student </a>
                    </li>
                    <li class="{{ Request::is('student') ? 'active' : '' }}">
                        <a href="{{ route('student.index') }}"> Students List </a>
                    </li>
                    <li class="{{ Request::is('st-attend-setting') ? 'active' : '' }}">
                        <a href="{{ route('st-attend-setting.index') }}"> Attendance Setting </a>
                    </li>
                    <li class="{{ Request::is('graduated') ? 'active' : '' }}">
                        <a href="{{ route('graduated.index') }}"> Graduated List </a>
                    </li>
                </ul>
            </li>


            <li class="menu {{ Request::is('role') ? 'active' : '' }}">
                <a href="#roles" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Roles</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('role') ? 'recent-submenu' : '' }}" id="roles" data-bs-parent="#accordionExample">
                    <li class="{{ Request::is('role') ? 'active' : '' }}">
                        <a href="{{ route('role.index') }}"> Roles List </a>
                    </li>
                </ul>
            </li>
            <li class="menu {{ Request::is('branch') ? 'active' : '' }}">
                <a href="#branches" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Branches</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('branch') ? 'recent-submenu' : '' }}" id="branches" data-bs-parent="#accordionExample">
                    <li class="{{ Request::is('branch') ? 'active' : '' }}">
                        <a href="{{ route('branch.index') }}"> Branch List </a>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Attandace Section</span></div>
            </li>
            <li class="menu {{ Request::is('settings') ? 'active' : '' }}"">
                <a href="{{ route('settings') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <span>Attendance Settings</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ Request::is('student-attendance') || Request::is('teacher-attendance') || Request::is('user-attendance') || Request::is('attendance') ? 'active' : '' }}">
                <a href="#attendance" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Attandance</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="attendance" data-bs-parent="#accordionExample">
                    <li class="{{ Request::is('attendance') ? 'active' : '' }}">
                        <a href="{{ route('attendance') }}"> Start Attandance </a>
                    </li>
                    <li class="{{ Request::is('user-attendance') ? 'active' : '' }}">
                        <a href="{{ route('user.attendance') }}"> Employee Attandance List </a>
                    </li>
                    <li class="{{ Request::is('teacher-attendance') ? 'active' : '' }}">
                        <a href="{{ route('teacher.attendance') }}"> Teacher Attandance List </a>
                    </li>
                    <li class="{{ Request::is('student-attendance') ? 'active' : '' }}">
                        <a href="{{ route('student.attendance') }}"> Student Attandance List </a>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Leave Section</span></div>
            </li>
            <li class="menu {{ Request::is('leave/create') || Request::is('student-leaves') || Request::is('teacher-leaves') || Request::is('employee-leaves') || Request::is('leaveType') ? 'active' : '' }}">
                <a href="#leave" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Leave Managment</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="leave" data-bs-parent="#accordionExample">
                    <li class="{{ Request::is('leave/create') ? 'active' : '' }}">
                        <a href="{{ route('leave.create') }}"> Add Leave </a>
                    </li>
                    <li class="{{ Request::is('leaveType') ? 'active' : '' }}">
                        <a href="{{ route('leaveType.index') }}"> Leave Types</a>
                    </li>
                    <li class="{{ Request::is('employee-leaves') ? 'active' : '' }}">
                        <a href="{{ route('employee.leaves') }}"> Employee Leave List </a>
                    </li>
                    <li class="{{ Request::is('teacher-leaves') ? 'active' : '' }}">
                        <a href="{{ route('teacher.leaves') }}"> Teacher Leave List </a>
                    </li>
                    <li class="{{ Request::is('student-leaves') ? 'active' : '' }}">
                        <a href="{{ route('student.leaves') }}"> Student Leave List </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Education Section</span></div>
            </li>
            <li class="menu {{ Request::is('course') || Request::is('teacher-course') || Request::is('student-course') || Request::is('curriculum/*') || Request::is('curriculum') || Request::is('lesson/*') || Request::is('lesson') || Request::is('assignment/create') || Request::is('assignment') ? 'active' : '' }}">
                <a href="#education" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Education</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="education" data-bs-parent="#accordionExample">
                    <li class="{{ Request::is('course') ? 'active' : '' }}">
                        <a href="{{ route('course.index') }}"> Course List </a>
                    </li>
                    <li class="{{ Request::is('teacher-course') ? 'active' : '' }}">
                        <a href="/teacher-course">Teacher Course List  </a>
                    </li>
                    <li class="{{ Request::is('student-course') ? 'active' : '' }}">
                        <a href="/student-course"> Enrollment </a>
                    </li>
                    <li class="{{ Request::is('curriculum/create') ? 'active' : '' }}">
                        <a href="{{ route('curriculum.create') }}"> Add Curriculum  </a>
                    </li>
                    <li class="{{ Request::is('curriculum') ? 'active' : '' }}">
                        <a href="{{ route('curriculum.index') }}"> Curriculum List </a>
                    </li>
                    <li class="{{ Request::is('lesson/create') ? 'active' : '' }}">
                        <a href="{{ route('lesson.create') }}"> Add Lesson</a>
                    </li>
                    <li class="{{ Request::is('lesson') ? 'active' : '' }}">
                        <a href="{{ route('lesson.index') }}"> Lessons List</a>
                    </li>
                    <li class="{{ Request::is('assignment/create') ? 'active' : '' }}">
                        <a href="{{ route('assignment.create') }}"> Add Assignment</a>
                    </li>
                    <li class="{{ Request::is('assignment') ? 'active' : '' }}">
                        <a href="{{ route('assignment.index') }}"> Assginmnet List</a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Maktoob Section</span></div>
            </li>
            <li class="menu {{ Request::is('maktob-type') || Request::is('maktob/create') || Request::is('maktob') ? 'active' : '' }}">
                <a href="#maktoob" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Maktoob Managment</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="maktoob" data-bs-parent="#accordionExample">
                    <li class="{{ Request::is('maktob-type') ? 'active' : '' }}">
                        <a href="{{ route('maktob-type.index') }}"> Maktoob Types List </a>
                    </li>
                    <li class="{{ Request::is('maktob/create') ? 'active' : '' }}">
                        <a href="{{ route('maktob.create') }}"> Add Maktob </a>
                    </li>
                    <li class="{{ Request::is('maktob') ? 'active' : '' }}">
                        <a href="{{ route('maktob.index') }}"> Maktoob List </a>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Report Section</span></div>
            </li>
            <li class="menu {{ Request::is('report/create') || Request::is('report') || Request::is('report-types') || Request::is('salary-report') || Request::is('salary-report/create') ? 'active' : '' }}">
                <a href="#report" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Report Managment</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="report" data-bs-parent="#accordionExample">
                    <li class="{{ Request::is('report/create') ? 'active' : '' }}">
                        <a href="{{ route('report.create') }}"> Create Report</a>
                    </li>
                    <li class="{{ Request::is('report') ? 'active' : '' }}">
                        <a href="{{ route('report.index') }}">Report List </a>
                    </li>
                    <li class="{{ Request::is('salary-report/create') ? 'active' : '' }}">
                        <a href="{{ route('salary-report.create') }}">Add Salary Report</a>
                    </li>
                    <li class="{{ Request::is('salary-report') ? 'active' : '' }}">
                        <a href="{{ route('salary-report.index') }}">Salary Report List </a>
                    </li>
                    <li class="{{ Request::is('report-types') ? 'active' : '' }}">
                        <a href="{{ route('report-types.index') }}"> Report Type List </a>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Graduateed Section</span></div>
            </li>
            <li class="menu">
                <a href="#graduated" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Certificate Management</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="graduated" data-bs-parent="#accordionExample">
                    <li>
                        <a href="{{ route('certificate.create') }}"> Add Certificate </a>
                    </li>
                    <li>
                        <a href="{{ route('certificate.index') }}"> Certifcates List </a>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Contract Section</span></div>
            </li>
            <li class="menu">
                <a href="#contract" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Contract Managment</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="contract" data-bs-parent="#accordionExample">
                    <li>
                        <a href="{{ route('contract.create') }}"> Add Contract </a>
                    </li>
                    <li>
                        <a href="{{ route('contract.index') }}"> Contracts List </a>
                    </li>
                    <li>
                        <a href="{{ route('contract-type.index') }}">Contract Type List </a>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Feedback Section</span></div>
            </li>
            <li class="menu">
                <a href="#feedback" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Feedback Managment</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="feedback" data-bs-parent="#accordionExample">
                    <li>
                        <a href="{{ route('feedback.create') }}">Send Feedback </a>
                    </li>
                    <li>
                        <a href="{{ route('feedback.index') }}"> Feedback List </a>
                    </li>
                    <li>
                        <a href="{{ route('feedback-type.index') }}"> Feedback Type List </a>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Survey Section</span></div>
            </li>
            <li class="menu">
                <a href="#survey" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Survey Managment</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="survey" data-bs-parent="#accordionExample">
                    <li>
                        <a href="{{ route('survey.create') }}">Survey Form </a>
                    </li>
                    <li>
                        <a href="{{ route('survey.index') }}"> Survey List </a>
                    </li>
                    <li>
                        <a href="{{ route('guarantee.index') }}"> User Garantee List </a>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Finance Section</span></div>
            </li>
            <li class="menu">
                <a href="#finance" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Finance Managment</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="finance" data-bs-parent="#accordionExample">
                    <li>
                        <a href="{{ route('request-item.create') }}">Request For Items </a>
                    </li>
                    <li>
                        <a href="{{ route('request-item.index') }}"> Request Item List </a>
                    </li>
                    <li>
                        <a href="{{ route('quotation.create') }}"> Add Quotation  </a>
                    </li>
                    <li>
                        <a href="{{ route('quotation.index') }}"> Quotation List </a>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Remittance Section</span></div>
            </li>
            <li class="menu">
                <a href="#remittance" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Remittance Managment</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="remittance" data-bs-parent="#accordionExample">
                    <li>
                        <a href="{{ route('remittance.create') }}">Send Remittance </a>
                    </li>
                    <li>
                        <a href="{{ route('remittance.index') }}">Remittances List </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Inventory Section</span></div>
            </li>
            <li class="menu">
                <a href="#inventory" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Inventory Managment</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="inventory" data-bs-parent="#accordionExample">
                    <li>
                        <a href="{{ route('category.index') }}"> Category List  </a>
                    </li>
                    <li>
                        <a href="{{ route('inventory.create') }}">Add Item </a>
                    </li>
                    <li>
                        <a href="{{ route('inventory.index') }}"> Items List </a>
                    </li>
                </ul>
            </li>
            
        </ul>
        
    </nav>

</div>
