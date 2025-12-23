@extends('admin.layouts.app')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card mt-5 p-2">
          <div class="card-header">
            <h3 class="card-title mt-2">Orders</h3>
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
                    <th>User Name</th>
                    <th>Payment Method</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $key => $order)
                    <tr>
                      <td>{{ $orders->currentPage() * $orders->perPage() - $orders->perPage() + $key + 1 }}</td>
                      <td>{{ $order->user->name }}</td>
                      <td>{{ $order->payment_method }}</td>
                      <td> $ {{ $order->total }}</td>
                      <td>
                        <input type="checkbox"
                          class="toggle-status"
                          data-id="{{ $order->id }}"
                          {{ $order->status === 'completed' ? 'checked disabled' : '' }}
                          data-toggle="toggle"
                          data-on="Completed"
                          data-off="Pending"
                          data-onstyle="success"
                          data-offstyle="danger"
                          title="{{ $order->status === 'completed' ? 'Order is already completed and cannot be changed.' : 'Click to change status' }}">
                      </td>
                      <td>
                        <a href="{{ route('admin.orderview', [$order->id]) }}" class="btn btn-primary">View Detail</a>
                      </td>
                    </tr>    
                  @endforeach
                </tbody>
              </table>

              <div class="d-flex justify-content-end">
                {{ $orders->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- Bootstrap Toggle -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    // Hide toast
    setTimeout(function () {
      $('.toast').fadeOut(200);
    }, 2000);

    // Toggle AJAX
    $('.toggle-status').change(function () {
      let orderId = $(this).data('id');
      let status = $(this).is(':checked') ? 'completed' : 'pending';

      $.ajax({
        url: "{{ route('admin.orders.toggle-status') }}",
        method: "POST",
        data: {
          _token: "{{ csrf_token() }}",
          order_id: orderId,
          status: status
        },
        success: function (response) {
          $('<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">' +
            response.message +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span></button></div>')
          .prependTo('.card-body')
          .delay(1500).fadeOut(400, function () {
            $(this).remove();
          });

          // Optionally reload or disable switch
          if (status === 'completed') {
            $('.toggle-status[data-id="' + orderId + '"]').prop('disabled', true).bootstrapToggle('disable');
          }
        },
        error: function () {
          alert('Failed to update order status.');
        }
      });
    });
  });
</script>
@endsection
