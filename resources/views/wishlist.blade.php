@extends('layouts.app')

@section('content')

<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumb" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="{{ route('indexxxx') }}">
                <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1">
        </li>
        <li class="breadcrumb is-active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="#" aria-current="page">
                <span itemprop="name">Wishlists</span>
            </a>
            <meta itemprop="position" content="2">
        </li>
    </ol>
</nav>

<main class="page">
    <div class="home-heading ot">
        <h1 class="page-heading"><strong>Wishlists</strong></h1>
    </div>

    <div class="container mt-4" id="wishlist-wrapper">
        @if($wishlists->isEmpty())
            <p>Your wishlist is empty.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>SKU</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wishlists as $item)
                            @php $product = $item->product; @endphp
                            @if($product)
                                <tr class="wishlist-item" data-product-id="{{ $product->id }}">
                                    <td width="100">
                                        <img src="{{ asset('admin/dist/img/product/'.$item->product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="80">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->sku_id ?? 'N/A' }}</td>
                                    <td>
                                        <div class="mb-2">
                                            <button class="btn btn-sm btn-primary btn-block" onclick="addToCart({{ $product->id }},'increase')">
                                                Add to Cart
                                            </button>
                                        </div>
                                       
                                    </td>
                                    <td>
                                         <div>
                                            <button class="btn btn-sm btn-danger btn-block" onclick="wishlist({{ $product->id }}, 'remove', this)">
                                                Remove
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</main>

@endsection

@push('scripts')
<script>
    window.wishlist = function(productId, operation, btn = null) {
        $.ajax({
            url: '{{ route("wishlist") }}',
            method: 'POST',
            data: {
                product_id: productId,
                operation: operation,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (operation === 'remove') {
                    $(`[data-product-id="${productId}"]`).remove();
                    if ($('.wishlist-item').length === 0) {
                        $('#wishlist-wrapper').html('<p>Your wishlist is empty.</p>');
                    }
                }
                alert(response.message);
            },
            error: function(xhr) {
                alert('Something went wrong.');
            }
        });
    };
    window.addToCart=function(productId,operation){
        $.ajax({
            url: '/cart/add',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: 1,
                _token: '{{ csrf_token() }}',
                operation:operation
            },
            success: function(response) {
                alert('Product Added Into the cart');
                singleCartUI(response.cart,response.cart_count,response.cart_total);
            },
            error: function(xhr) {
                if (xhr.status === 401) {
                    var data = xhr.responseJSON;
                    if (data.redirect_url) {
                        window.location.href = data.redirect_url;
                    }
                } else {
                    alert('An error occurred while adding the product to the cart.');
                }
            }
        });
    }
</script>
@endpush