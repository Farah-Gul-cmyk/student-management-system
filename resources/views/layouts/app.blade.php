<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Project</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .top-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            height: 60px;
        }
        .dashboard-container {
            margin-top: 60px; 
        }
    </style>
</head>
<body>

    <div class="main-wrapper">
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark top-header px-3 shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">🎓 Student Management System</a>
            </div>
        </nav>

        <div class="container-fluid dashboard-container">
            <div class="row">
                
                <div class="col-md-3 col-lg-2 px-0 bg-white border-end min-vh-100">
                    <x-sidebar />
                </div>
                
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>