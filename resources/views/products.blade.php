@extends('layouts.app')
@section('content')

<!-- Breadcrumb -->
<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumb is-active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="{{ route('brands') }}" aria-current="page">
                <span itemprop="name">{{ $brand->name }}</span>
            </a>
            <meta itemprop="position" content="2">
        </li>
    </ol>
</nav>

<!-- Brand Info -->
<div class="cate-des">
    <h1 class="page-heading">{{ $brand->name }}</h1>
    <div data-content-region="category_below_header"></div>
    <div class="row">
        <div class="col-xl-2 col-sm-3 col-12">
            <img src="{{ asset('admin/dist/img/'.$brand->image) }}" alt="{{ $brand->name }}" title="{{ $brand->name }}" class="category-header-image">
        </div>
        {{-- <div class="col-xl-10 col-sm-9 col-12">
            <p>Vivamus consectetur semper pellentesque. Aliquam auctor metus eget sapien volutpat, in faucibus justo elementum. Etiam tincidunt lectus nisl, at facilisis odio euismod nec.</p>
        </div> --}}
    </div>
</div>

<!-- Products -->
<div class="page">
    <div class="cate-mar">
        <main class="page-content" id="product-listing-container">
            <!-- Grid View -->
            <ul class="productGrid row pro-margin">
                @if($products->count())
                    @foreach($products as $pro)
                        <li class="product col-lg-4 col-md-4 col-12">
                            <article class="card">
                                <figure class="card-figure text-left">
                                    <a href="{{ route('product.detail',$pro->id) }}">
                                        <div class="card-img-container">
                                            <img src="{{ asset('admin/dist/img/product/'.$pro->image)}}" alt="{{ $pro->name }}" title="{{ $pro->name }}" class="card-image">
                                        </div>
                                    </a>
                                </figure>
                                <div class="card-body text-center">
                                    <h3 class="card-title">
                                        <a href="{{ route('product.detail',$pro->id) }}">{{ $pro->name }}</a>
                                    </h3>
                                    <div class="card-text">
                                        <span class="price">{{ $pro->price }} PKR</span>
                                    </div>
                                    <div class="top-btn mt-2">
                                        <a href="#" class="cartb btn btn-sm btn-primary" data-product-id="{{ $pro->id }}">Add to Cart</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                @endif
            </ul>

            <!-- List View -->
            <ul class="productList d-none">
                @if($products->count())
                    @foreach($products as $pro)
                        <li class="product">
                            <article class="listItem">
                                <figure class="listItem-figure">
                                    <img src="{{ asset('admin/dist/img/product/'.$pro->image)}}" alt="{{ $pro->name }}" title="{{ $pro->name }}">
                                </figure>
                                <div class="listItem-body">
                                    <div class="listItem-content">
                                        <h4 class="listItem-title">
                                            <a href="{{ route('product.detail',$pro->id) }}">{{ $pro->name }}</a>
                                        </h4>
                                        <div class="listItem-price">{{ $pro->price }} PKR</div>
                                        <a href="#" class="cartb btn btn-sm btn-primary mt-2" data-product-id="{{ $pro->id }}">Add to Cart</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                @endif
            </ul>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>

        </main>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Grid/List toggle
    $('#gridProduct').click(function() {
        $('.productGrid').removeClass('d-none');
        $('.productList').addClass('d-none');
    });
    $('#listProduct').click(function() {
        $('.productList').removeClass('d-none');
        $('.productGrid').addClass('d-none');
    });

    // Add to Cart AJAX
    $('.cartb').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');
        $.ajax({
            url: '/cart/add',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: 1,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('Product added to cart!');
               
            },
            error: function(xhr) {
                if(xhr.status === 401){
                    // If unauthorized, redirect to login page
                    var data = xhr.responseJSON;
                    if(data.redirect_url){
                        window.location.href = data.redirect_url;
                    } else {
                        window.location.href = '/userlogin'; // fallback
                    }
                } else {
                    alert('Failed to add product to cart.');
                }
            }
        });
    });
});
</script>
@endpush

@endsection
