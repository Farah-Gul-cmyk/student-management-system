@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Manage Roles & Permissions</h2>
    
    <div class="row">
        @php
            $roles = [
                ['slug' => 'admin', 'title' => 'Administrator', 'desc' => 'Full system access and control.'],
                ['slug' => 'teacher', 'title' => 'Teacher', 'desc' => 'Manage classes, students, and grades.'],
                ['slug' => 'student', 'title' => 'Student', 'desc' => 'View courses, profile, and status.'],
            ];
        @endphp

        @foreach($roles as $role)
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold text-uppercase text-primary">{{ $role['title'] }}</h5>
                            <p class="text-muted mb-0 small">{{ $role['desc'] }}</p>
                        </div>
                        <a href="{{ url('/roles/' . $role['slug'] . '/edit') }}" class="btn btn-dark btn-sm">
                            Configure Permissions ⚙️
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection