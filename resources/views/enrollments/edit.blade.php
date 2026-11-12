@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Enrollment</h1>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="student_id" class="form-label">Select Student</label>
                    <select class="form-control @error('student_id') is-invalid @enderror" id="student_id" name="student_id" required>
                        <option value="">-- Choose Student --</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id', $enrollment->student_id) == $student->id ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('student_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="batch_id" class="form-label">Select Batch</label>
                    <select class="form-control @error('batch_id') is-invalid @enderror" id="batch_id" name="batch_id" required>
                        <option value="">-- Choose Batch --</option>
                        @foreach($batches as $batch)
                            <option value="{{ $batch->id }}" {{ old('batch_id', $enrollment->batch_id) == $batch->id ? 'selected' : '' }}>
                                {{ $batch->name }} ({{ $batch->course->title ?? '' }})
                            </option>
                        @endforeach
                    </select>
                    @error('batch_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="enrollment_date" class="form-label">Enrollment Date</label>
                    <input type="date" class="form-control @error('enrollment_date') is-invalid @enderror" id="enrollment_date" name="enrollment_date" value="{{ old('enrollment_date', $enrollment->enrollment_date) }}">
                    @error('enrollment_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success">Update Enrollment</button>
                <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection