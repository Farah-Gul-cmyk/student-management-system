<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">
                    Student
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}" href="{{ url('/roles') }}">
                    ⚙️ Roles & Permissions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('teachers.*') ? 'active' : '' }}" href="{{ route('teachers.index') }}">
                    Teacher
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}" href="{{ route('courses.index') }}">
                    Courses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('batches.*') ? 'active' : '' }}" href="{{ route('batches.index') }}">
                    Batches
                </a>
            </li>
            <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('enrollments.*') ? 'active' : '' }}" href="{{ route('enrollments.index') }}">
        Enrollment
    </a>
</li>
        </ul>
    </div>
</nav>