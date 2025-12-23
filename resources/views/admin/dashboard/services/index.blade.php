@extends('admin.layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5 p-2">
            <div class="card-header">
              <h3 class="card-title mt-2">Services</h3>
              <div class="row">
                  <div class="col-md-9 col-sm-8 col-4"></div>
                  <div class="col-md-3 col-sm-4 col-8 text-end">
                      <a href="{{ route('admin.addservice') }}" class="btn btn-primary">Add Service</a>
                  </div>
              </div>

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
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover w-100">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Heading/Title</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($services)
                      @foreach($services as $key => $service)
                        <tr>
                          <td>{{ $services->currentPage() * $services->perPage() - $services->perPage() + $key + 1 }}</td>
                          <td>{{ $service->heading }}</td>
                          <td><a href="{{ route('admin.editservice',$service->id)}}" class="btn btn-sm btn-primary">Edit</a></td>
                          <td><a href="{{ route('admin.deleteservice',$service->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>    
                      @endforeach
                    @endif
                  </tbody>
                </table>
                 <div class="d-flex justify-content-end">
                    {{ $services->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
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
