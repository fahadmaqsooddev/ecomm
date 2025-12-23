@extends('admin.layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5 p-2">
            <div class="card-header">
              <h3 class="card-title mt-2">Contact Us</h3>
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
                      <th>FullName</th>
                      <th>Email</th>
                    
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($contacts)
                      @foreach($contacts as $key => $contact)
                        <tr>
                          <td>{{ $contacts->currentPage() * $contacts->perPage() - $contacts->perPage() + $key + 1 }}</td>
                          <td>{{ $contact->fullname }}</td>
                          <td>{{ $contact->email }}</td>
                          <td><a href="{{ route('admin.contactview', [$contact->id]) }}" class="btn btn-primary">View</a></td>
                        </tr>    
                      @endforeach
                    @endif
                  </tbody>
                </table>
                 <div class="d-flex justify-content-end">
                    {{ $contacts->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
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
  <script>
  $(document).ready(function() {
    // Hide the toast after 5 seconds
    setTimeout(function() {
      $('.toast').fadeOut(200); // Fade out over 500 milliseconds
    }, 2000); // 5000 milliseconds = 5 seconds
  });
</script>
@endsection
