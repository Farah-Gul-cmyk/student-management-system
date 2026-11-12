@extends('layouts.app') {{-- Agar aapka layout use ho raha hai, warna apne layout ka naam yahan likhein --}}

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Teacher</h1>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $teacher->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $teacher->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $teacher->phone) }}">
                </div>

                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" class="form-control" id="department" name="department" value="{{ old('department', $teacher->department) }}">
                </div>

                <button type="submit" class="btn btn-success">Update Teacher</button>
                <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection