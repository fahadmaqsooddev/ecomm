@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Contact Details</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Update Contact Details</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Contact Details</h3>
          </div>

          @if(Session::has('msg'))
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
              <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header p-3">
                  <strong class="mr-auto">{{ Session::get('msg') }}</strong>
                  <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
              </div>
            </div>
          @endif

          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('admin.update-contact-details') }}" method="POST">
            @csrf
            <div class="card-body">
                <h5>Contact Details</h5>
                
                <div class="form-group">
                    <label for="address">Business Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $data->address) }}">
                </div>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="number" name="phone" class="form-control" value="{{ old('phone', $data->phone) }}">
                </div>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $data->email) }}">
                </div>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="email">Website </label>
                    <input type="text" name="website" class="form-control" value="{{ old('website', $data->website) }}">
                </div>
                @error('website')
                    <div class="text-danger">{{ $message }}</div>
                @enderror




            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
      </div>
      <!--/.col (left) -->
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    // Hide the toast after 5 seconds
    setTimeout(function() {
      $('.toast').fadeOut(200); // Fade out over 200 milliseconds
    }, 2000); // 2000 milliseconds = 2 seconds
  });
</script>
@endsection
