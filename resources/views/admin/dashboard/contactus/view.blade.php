@extends('admin.layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Contact Us Detail</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Contact Us Detail</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5 p-2">
            <div class="card-header">
              <h3 class="card-title mt-2">Contact Us Detail</h3>
            </div>
            @if(Session::has('msg'))
                <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                  <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header p-3">
                    <strong class="mr-auto">{{ Session::get('msg') }}</strong>
                    <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    </div>
                </div>
            
            @endif
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                    <div class="col-md-6">
                        <h6><b>Name :</b> {{ $contact->fullname }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>Phone Number :</b> {{ $contact->phone_number }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <h6><b>Email :</b> {{ $contact->email }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>Order Number :</b> {{ $contact->order_number }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <h6><b>Company Name :</b> {{ $contact->company_name }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>RMA Number :</b> {{ $contact->rma_number }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-12">
                        <h6><b>Comments :</b> {{ $contact->comments }}</h6>  
                    </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
  $(document).ready(function() {
    // Hide the toast after 5 seconds
    setTimeout(function() {
      $('.toast').fadeOut(200); // Fade out over 500 milliseconds
    }, 2000); // 5000 milliseconds = 5 seconds
  });
</script>
@endsection
