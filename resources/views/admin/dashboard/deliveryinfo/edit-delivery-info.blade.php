@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Delivery Info</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Delivery Info</li>
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
            <h3 class="card-title">Edit Delivery Info</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('admin.updatedeliveryinfo',$deliveryinfo->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
              
              <div class="form-group">
                <label for="heading">Heading</label>
                <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter Heading" value="{{ @old('heading',$deliveryinfo->heading)}}">
                @error('heading')
                    <span class="text-danger mt-5">{{ $message }}</span>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="summernote" placeholder="Enter Description">{{ old('description', $deliveryinfo->description) }}</textarea>
                 @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

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
  $(function () {
    // Initialize Summernote with custom height
    $('#summernote').summernote({
      height: 300 // Set the desired height in pixels
    });
  });
</script>
  @endsection
