@extends('admin.layouts.app')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card mt-5 p-2">
          <div class="card-header">
            <h3 class="card-title mt-2">Payments</h3>
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
              <table id="example2" class="table table-bordered table-hover w-100">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Transaction ID</th>
                    <th>Payment Method</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($payments as $key => $payment)
                    <tr>
                      <td>{{ $payments->currentPage() * $payments->perPage() - $payments->perPage() + $key + 1 }}</td>
                      <td>{{ $payment->transaction_id }}</td>
                      <td>{{ $payment->method }}</td>
                      <td>{{ $payment->order->total }}</td>
                      <td>{{ $payment->status }}</td>
                      <td>
                        <a href="{{ route('admin.orderview', [$payment->order->id]) }}" class="btn btn-primary">Order Detail</a>
                      </td>
                    </tr>    
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                {{ $payments->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    // Hide toast
    setTimeout(function () {
      $('.toast').fadeOut(200);
    }, 2000);


  });
</script>
@endsection
