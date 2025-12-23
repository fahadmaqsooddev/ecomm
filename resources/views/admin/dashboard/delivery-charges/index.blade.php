@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Delivery Charges</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Delivery Charges</li>
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
            <h3 class="card-title">Update Delivery Charges</h3>
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

          <!-- form start -->
          <form action="{{ route('admin.delivery-charges') }}" method="POST">
            @csrf
            <div class="card-body">
              <h5>Contact Settings</h5>

              <div class="form-group">
                <label for="shipping_charges">Shipping Charges</label>
                <input type="text" name="shipping_charges" class="form-control" value="{{ old('shipping_charges', $data->shipping_charges) }}">
                @error('shipping_charges')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="tax">Tax (%)</label>
                <input type="text" name="tax" class="form-control" value="{{ old('tax', $data->tax) }}">
                @error('tax')
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
    </div>
  </div>
</section>

<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    setTimeout(function() {
      $('.toast').fadeOut(200);
    }, 2000);
  });
</script>
@endsection
