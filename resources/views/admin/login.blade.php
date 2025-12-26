<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            height: 100vh; /* Make body full height */
        }
        .header {
            background-color: #17a2b8;
        }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%; /* Full height to center vertically */
        }
        .card {
            width: 100%; /* Full width */
            max-width: 500px; /* Max width for larger screens */
        }
    </style>
</head>
<body>
    <div class="container-fluid form-container">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title text-center">Admin Login</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Email</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="email"
                                    name="email"
                                    id="inputEmail3"
                                    class="form-control"
                                    value="{{ request()->cookie('admin_email') }}" placeholder="Email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-form-label">Password</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input type="checkbox" name="remember_email" class="form-check-input mt-1" id="rememberMe"  {{ request()->cookie('admin_email') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('msg'))
                        <p class="text-danger text-center">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-info">Login</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
