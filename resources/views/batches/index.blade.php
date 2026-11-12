@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Batch List</h2>
        <a href="{{ route('batches.create') }}" class="btn btn-primary">Add New Batch</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Batch Name</th>
                        <th>Course</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($batches as $batch)
                        <tr>
                            <td>{{ $batch->id }}</td>
                            <td>{{ $batch->name }}</td>
                            <td>{{ $batch->course->title ?? 'N/A' }}</td>
                            <td>{{ $batch->start_date ?? 'N/A' }}</td>
                            <td>{{ $batch->end_date ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('batches.edit', $batch->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('batches.destroy', $batch->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No batches found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection