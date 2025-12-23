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
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                        @error('email')
                            <p class="text-danger text-center">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                         @error('password')
                            <p class="text-danger text-center">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-4 col-sm-8">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                <label class="form-check-label" for="exampleCheck2">Remember me</label>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('msg'))
                        <p class="text-danger text-center">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Sign in</button>
                    <button type="reset" class="btn btn-danger float-right">Cancel</button>
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
