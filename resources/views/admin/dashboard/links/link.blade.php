@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Links</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Update Link</li>
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
            <h3 class="card-title">Update Link</h3>
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
          <form action="{{ route('admin.updatelinks') }}" method="POST">
    @csrf
    <div class="card-body">
        <!-- Social Media Links Section -->
        <h5>Social Media Links</h5>
        
        <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $data->twitter_link) }}">
        </div>
        @error('twitter')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $data->facebook_link) }}">
        </div>
        @error('facebook')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="linkedin">LinkedIn</label>
            <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $data->linkedin_link) }}">
        </div>
        @error('linkedin')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="instagram">Instagram</label>
            <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $data->instagram_link) }}">
        </div>
        @error('instagram')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="youtube">YouTube</label>
            <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $data->youtube_link) }}">
        </div>
        @error('youtube')
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

<script>
  $(document).ready(function() {
    // Hide the toast after 5 seconds
    setTimeout(function() {
      $('.toast').fadeOut(200); // Fade out over 200 milliseconds
    }, 2000); // 2000 milliseconds = 2 seconds
  });
</script>
@endsection
