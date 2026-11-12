<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role Permissions</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Permissions for Role: <span class="text-uppercase">{{ $role }}</span></h4>
                    </div>
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('roles.update', $role) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <h5 class="text-secondary border-bottom pb-2">Student Management Permissions</h5>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="permissions[]" value="view_students" class="form-check-input" id="view_students"
                                        {{ in_array('view_students', $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="view_students">View Students</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" name="permissions[]" value="create_students" class="form-check-input" id="create_students"
                                        {{ in_array('create_students', $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="create_students">Create Student</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" name="permissions[]" value="edit_students" class="form-check-input" id="edit_students"
                                        {{ in_array('edit_students', $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="edit_students">Edit Student</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" name="permissions[]" value="delete_students" class="form-check-input" id="delete_students"
                                        {{ in_array('delete_students', $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="delete_students">Delete Student</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('students.index') }}" class="btn btn-secondary">Go to Dashboard</a>
                                <button type="submit" class="btn btn-success">Update Permissions</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>