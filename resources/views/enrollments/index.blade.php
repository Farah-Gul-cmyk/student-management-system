@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Enrollment List</h2>
        <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Add New Enrollment</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Batch Name</th>
                        <th>Course</th>
                        <th>Enrollment Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->id }}</td>
                            <td>{{ $enrollment->student->name ?? 'N/A' }}</td>
                            <td>{{ $enrollment->batch->name ?? 'N/A' }}</td>
                            <td>{{ $enrollment->batch->course->title ?? 'N/A' }}</td>
                            <td>{{ $enrollment->enrollment_date ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No enrollments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection