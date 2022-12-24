<li class="menu menu-heading">
    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Attendance Section</span></div>
</li>
<li class="menu {{ Request::is('class/*') || Request::is('single-user/*') || Request::is('class') ? 'active' : '' }}">
    <a href="#class_attendance" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
            <span>Class Attendance</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="class_attendance" data-bs-parent="#accordionExample">
        <li class="{{ Request::is('class') ? 'active' : '' }}">
            <a href="{{ route('class.index') }}"> Attendance List </a>
        </li>
        <li class="{{ Request::is('single-user/*') ? 'active' : '' }}">
            <a href="#">Show Student</a>
        </li>
    </ul>
</li>

<li class="menu menu-heading">
    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Education Section</span></div>
</li>
<li class="menu {{ Request::is('th-course') || Request::is('st-course') || Request::is('th_curriculum/*') || Request::is('th_curriculums') || Request::is('add/lesson') || Request::is('all/lessons') || Request::is('th-course/*') || Request::is('all_assignment') || Request::is('edit/assignment/*') ? 'active' : '' }}">
    <a href="#education" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
            <span>Education</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="education" data-bs-parent="#accordionExample">
        <li class="{{ Request::is('th-course') ? 'active' : '' }}">
            <a href="/th-course">Teacher Course List  </a>
        </li>
        <li class="{{ Request::is('st-course') ? 'active' : '' }}">
            <a href="/st-course"> Enrollment </a>
        </li>
        <li class="{{ Request::is('th_curriculums') || Request::is('th_curriculum/*') ? 'active' : '' }}">
            <a href="{{ route('all.th_curriculum') }}"> Curriculum List </a>
        </li>
        <li class="{{ Request::is('add/lesson') ? 'active' : '' }}">
            <a href="{{ route('add.lesson') }}"> Add Lesson</a>
        </li>
        <li class="{{ Request::is('all/lessons') || Request::is('th-course/*/edit') ? 'active' : '' }}">
            <a href="{{ route('all.lessons') }}"> Lessons List</a>
        </li>
        <li class="{{ Request::is('th-course/create') ? 'active' : '' }}">
            <a href="{{ route('th-course.create') }}"> Add Assignment</a>
        </li>
        <li class="{{ Request::is('all_assignment') || Request::is('edit/assignment/*') ? 'active' : '' }}">
            <a href="{{ route('all.assignments') }}"> Assginmnet List</a>
        </li>
    </ul>
</li>

<li class="menu menu-heading">
    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Feedback Section</span></div>
</li>
<li class="menu {{ Request::is('th_feedback/create') || Request::is('th_feedback') || Request::is('th_feedback/*/edit') ? 'active' : '' }}">
    <a href="#feedback" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
            <span>Feedback Managment</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="feedback" data-bs-parent="#accordionExample">
        <li class="{{ Request::is('th_feedback/create') ? 'active' : ''}}">
            <a href="{{ route('th_feedback.create') }}">Send Feedback </a>
        </li>
        <li class="{{ Request::is('th_feedback') || Request::is('th_feedback/*/edit') ? 'active' : ''}}">
            <a href="{{ route('th_feedback.index') }}">Feedback List</a>
        </li>
    </ul>
</li>

<li class="menu menu-heading">
    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Leave Section</span></div>
</li>
<li class="menu {{ Request::is('th_leave/create') || Request::is('th_leave') ? 'active' : '' }}">
    <a href="#leave" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
            <span>Leave Managment</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="leave" data-bs-parent="#accordionExample">
        <li class="{{ Request::is('th_leave/create') ? 'active' : '' }}">
            <a href="{{ route('th_leave.create') }}"> Add Leave </a>
        </li>
        <li class="{{ Request::is('th_leave') ? 'active' : '' }}">
            <a href="{{ route('th_leave.index') }}"> Teacher Leave List </a>
        </li>
    </ul>
</li>

<li class="menu menu-heading">
    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Contract Section</span></div>
</li>
<li class="menu {{ Request::is('th_contract') || Request::is('th_contract/*') ? 'active' : '' }}">
    <a href="{{ route('th_contract.index') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
            <span>Your Contracts</span>
        </div>
    </a>
</li>

<li class="menu menu-heading">
    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Report Section</span></div>
</li>
<li class="menu {{ Request::is('th_report/create') || Request::is('th_report') || Request::is('th_report/show/*') ? 'active' : '' }}">
    <a href="#report" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify"><line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line></svg>
            <span>Report Managment</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="report" data-bs-parent="#accordionExample">
        <li class="{{ Request::is('th_report/create') ? 'active' : '' }}">
            <a href="{{ route('th_report.create') }}"> Send Report </a>
        </li>
        <li class="{{ Request::is('th_report') || Request::is('th_report/show/*') ? 'active' : '' }}">
            <a href="{{ route('th_report.index') }}"> Report List </a>
        </li>
    </ul>
</li>