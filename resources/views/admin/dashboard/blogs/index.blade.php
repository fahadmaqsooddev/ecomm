@extends('admin.layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5 p-2">
            <div class="card-header">
              <h3 class="card-title mt-2">Blogs</h3>
              <div class="row">
                <div class="col-md-9 col-sm-8 col-4"></div>
                <div class="col-md-3 col-sm-4 col-8 text-end">
                  <a href="{{ route('admin.addblog') }}" class="btn btn-primary">Add Blog</a>
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
              <div class="row">
                @foreach($blogs as $blog)
                  <div class="col-md-4 mb-4">
                    <div class="card">
                      <img src="{{ asset('admin/dist/img/'.$blog->image) }}" class="card-img-top rounded-circle" alt="{{ $blog->heading }}" style="width: 100%; min-height:280px; max-width: 275px; margin: auto;">
                      <h5 class="card-title text-center mt-3">{{ $blog->heading }}</h5>
                      <div class="card-body text-center">
                        <div class="btn-group" role="group" aria-label="Basic example" style="width: 100%; justify-content: space-between;">
                          <a href="{{ route('admin.editblog', $blog->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                          </a>
                          <a href="{{ route('admin.deleteblog', $blog->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog?');">
                            <i class="fas fa-trash-alt"></i> Delete
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="table-responsive">
                <div class="d-flex justify-content-end">
                  {{ $blogs->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
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
        $('.toast').fadeOut(200); // Fade out over 200 milliseconds
      }, 2000); // 2000 milliseconds = 2 seconds
    });
  </script>
@endsection
