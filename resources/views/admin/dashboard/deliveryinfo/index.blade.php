@extends('admin.layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5 p-2">
            <div class="card-header">
              <h3 class="card-title mt-2">Delivery Info</h3>
              <div class="row">
                <div class="col-md-9 col-sm-8 col-4"></div>
                <div class="col-md-3 col-sm-4 col-8 text-end">
                  <a href="{{ route('admin.adddeliveryinfo') }}" class="btn btn-primary">Add DeliveryInfo</a>
                </div>
              </div>
            </div>

            @if(Session::has('msg'))
              <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-header p-3">
                    <strong class="mr-auto">{{ Session::get('msg') }}</strong>
                    <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                </div>
              </div>
            @endif
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      
                      <th>Heading</th>
                      <th>Description</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($deliveryinfo as $info)
                      <tr>
                        
                        <td>{{ $info->heading }}</td>
                        <td>
                            {{ $info->description }}
                        </td>
                        <td>
                            <a href="{{ route('admin.editdeliveryinfo', $info->id) }}" class="btn btn-sm btn-primary">
                               Edit
                            </a>
                        </td>
                        <td>
                        <a href="{{ route('admin.deletedeliveryinfo', $info->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this testimonial?');">
                               Delete
                            </a>
                        </td>
                          
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex justify-content-end">
                  {{ $deliveryinfo->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
                </div>
              </div>
              <!-- /.table-responsive -->
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
        $('.toast').fadeOut(200); // Fade out over 200 milliseconds
      }, 2000); // 2000 milliseconds = 2 seconds
    });
  </script>
@endsection
