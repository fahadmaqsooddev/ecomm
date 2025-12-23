@extends('layouts.app')
@section('content')

<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumb" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="../index.html">
                <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1">
        </li>
        <li class="breadcrumb is-active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="index.html" aria-current="page">
                <span itemprop="name">Orders</span>
            </a>
            <meta itemprop="position" content="2">
        </li>
    </ol>
</nav>

<main class="page">
    <div class="home-heading ot"><h1 class="page-heading"><strong>Orders</strong></h1></div>

    @if($orders->count())
        <div class="orders-list">
            @foreach($orders as $order)
                <div class="order-card mb-4 p-3 border rounded shadow-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>
                                Order #{{ $order->id }}
                                <small class="text-muted">({{ $order->created_at->format('M d, Y') }})</small>
                            </h4>
                        </div>
                         
                    </div>
                    <div class="row mt-3">
                        {{-- Left side --}}
                        <div class="col-md-6">
                           

                           

                          
                            <p class="mb-1"><strong>First Name :</strong> {{ $order->address->first_name }}</p>
                            <p class="mb-1"><strong>Company : </strong> {{ $order->address->company }}</p>
                            <p class="mb-1"><strong>Address : </strong> {{ $order->address->address1 }}</p>
                            <p class="mb-1"><strong>State/Province : </strong> {{ $order->address->state_or_province }}</p>
                            <p class="mb-1"><strong>Postal Code : </strong> {{ $order->address->postal_code }}</p>
                             
                            <p class="mb-1"><strong>Comments : </strong> {{ $order->order_comment }}</p>
                        </div>

                        {{-- Right side --}}
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Last Name :</strong> {{ $order->address->last_name }}</p>
                            <p class="mb-1"><strong>Payment : </strong> {{ $order->payment_method }}</p>
                            <p class="mb-1"><strong>Phone : </strong> {{ $order->address->phone }}</p>
                            <p class="mb-1"><strong>Apartment : </strong> {{ $order->address->address2 }}</p>
                            <p class="mb-1"><strong>Status:</strong>
                                <span class="badge 
                                    @if($order->status === 'pending') badge-warning
                                    @elseif($order->status === 'processing') badge-primary
                                    @elseif($order->status === 'completed') badge-success
                                    @elseif($order->status === 'cancelled') badge-danger
                                    @else badge-secondary
                                    @endif">
                                    {{ ucfirst($order->status ?? 'N/A') }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>${{ number_format($item->total, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Shipping Charges</strong></td>
                                <td>${{ number_format($order->shipping_cost, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Tax</strong></td>
                                <td>${{ number_format($order->tax, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Total</strong></td>
                                <td><strong>${{ number_format($order->total, 2) }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Order Detail Modal -->
                <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel{{ $order->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderModalLabel{{ $order->id }}">Order #{{ $order->id }} Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y H:i A') }}</p>
                                <p><strong>Status:</strong>
                                    <span class="badge 
                                        @if($order->status === 'pending') badge-warning
                                        @elseif($order->status === 'processing') badge-primary
                                        @elseif($order->status === 'completed') badge-success
                                        @elseif($order->status === 'cancelled') badge-danger
                                        @else badge-secondary
                                        @endif">
                                        {{ ucfirst($order->status ?? 'N/A') }}
                                    </span>
                                </p>
                                <p><strong>Payment Method:</strong> {{ strtoupper($order->payment_method ?? 'N/A') }}</p>
                                
                                @if($order->shippingAddress)
                                    <hr>
                                    <h6>Shipping Address</h6>
                                    <p>
                                        {{ $order->shippingAddress->first_name ?? '' }} {{ $order->shippingAddress->last_name ?? '' }}<br>
                                        {{ $order->shippingAddress->address1 ?? '' }}<br>
                                        {{ $order->shippingAddress->city ?? '' }}, {{ $order->shippingAddress->postal_code ?? '' }}<br>
                                        {{ $order->shippingAddress->country_code ?? '' }}
                                    </p>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>You haven't placed any orders yet.</p>
    @endif
</main>



@endsection
@push('scripts')

@endpush