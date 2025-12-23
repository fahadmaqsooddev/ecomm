@extends('admin.layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Order Detail</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Order Detail</li>
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
              <h3 class="card-title mt-2">Order Detail</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                    <div class="col-md-6">
                        <h6><b>User Name :</b> {{ $order->user->name }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>User Email :</b> {{ $order->user->email }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <h6><b>First Name :</b> {{ $order->address->first_name }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>Last Name :</b> {{ $order->address->last_name }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <h6><b>Company Name :</b> {{ $order->address->company }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>Phone :</b> {{ $order->address->phone }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <h6><b>City :</b> {{ $order->address->city }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>State/Province :</b> {{ $order->address->state_or_province }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <h6><b>Postal Code :</b> {{ $order->address->postal_code }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>State/Province :</b> {{ $order->address->country_code }}</h6>  
                    </div>
              </div>
               <div class="row">
                    <div class="col-md-6">
                        <h6><b>Address :</b> {{ $order->address->address1 }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>Apartment/Suite :</b> {{ $order->address->address2 }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <h6 ><b>Status : <span class="{{ $order->status === 'completed' ? 'badge badge-success' : 'badge badge-danger' }}">{{ $order->status }}</span></b></h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>Created By :</b> {{ $order->created_by }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <h6><b>Shipping Cost :</b> {{ $order->shipping_cost }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>Tax :</b> {{ $order->tax }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <h6><b>Sub Total :</b> {{ $order->subtotal }}</h6>  
                    </div>
                    <div class="col-md-6">
                        <h6><b>Total :</b> {{ $order->total }}</h6>  
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-12">
                        <h6><b>Comments :</b> {{ $order->order_comment }}</h6>  
                    </div>
              </div>

              <div class="row mt-4">
                    <div class="col-md-12">
                        <h6>Order Items</h6>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Line Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->items as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->product->name ?? 'N/A' }}</td>
                                        <td>{{ number_format($item->price, 2) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->total, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No items found for this order.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
 
@endsection
