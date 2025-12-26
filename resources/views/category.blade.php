@extends('layouts.app')
@section('content')

<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <!-- <li class="breadcrumb " itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="../index.html">
                <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1">
        </li> -->
        <li class="breadcrumb is-active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="index.html" aria-current="page">
                <span itemprop="name">{{ $category->name }}</span>
            </a>
            <meta itemprop="position" content="2">
        </li>
    </ol>
</nav>
<div class="cate-des">
    <h1 class="page-heading">{{ $category->name }}</h1>
    <div data-content-region="category_below_header"></div>
    <div class="row">
        <div class="col-xl-2 col-sm-3 col-12">
            <img src="{{ asset('admin/dist/img/'.$category->image) }}" alt="{{ $category->name }}" title="{{ $category->name }}" data-sizes="auto"  class="category-header-image lazyautosizes ls-is-cached lazyloaded" sizes="111px">
        </div>
        <div class="col-xl-10 col-sm-9 col-12">
            <p>Vivamus consectetur semper pellentesque. Aliquam auctor metus eget sapien volutpat, in faucibus justo elementum. Etiam tincidunt lectus nisl, at facilisis odio euismod nec. Nulla ut lorem lacus. Mauris sit amet metus lobortis, vulputate ipsum eu, vehicula orci. In hac habitasse platea dictumst. Vestibulum mattis vulputate nisl vel sodales. Duis accumsan dignissim leo id faucibus.</p>
        </div>
    </div>
</div>
<div class="page">
    <div class="cate-mar">
        <main class="page-content" id="product-listing-container">
            <div class="row cate-top">
                <div class="col-md-6 col-3 wb-grid-list">
                    <span id="gridProduct" class="active"><svg width="20px" height="20px"><use xlink:href="#cgrid"></use></svg></span>
                    <span id="listProduct"><svg width="20px" height="20px"><use xlink:href="#clist"></use></svg></span>
                    <input type="hidden" id="gridlist" value="">
                </div>
                <div class="col-md-6 col-9"> <form class="actionBar" method="get" data-sort-by="">
                    <fieldset class="form-fieldset actionBar-section">
                        <div class="form-field">
                            <label class="form-label" for="sort">Sort By:</label>
                            <select class="form-select form-select--small " name="sort" id="sort" role="listbox">
                                <option value="featured" selected="">Featured Items</option>
                                <option value="newest">Newest Items</option>
                                <option value="bestselling">Best Selling</option>
                                <option value="alphaasc">A to Z</option>
                                <option value="alphadesc">Z to A</option>
                                <option value="avgcustomerreview">By Review</option>
                                <option value="priceasc">Price: Ascending</option>
                                <option value="pricedesc">Price: Descending</option>
                            </select>
                        </div>
                    </fieldset>
                    <input type="hidden" id="category" value="{{ $category->id }}">
                </form>
            </div>
        </div>
        <div class="xs-filter"></div>
        
        <form action="https://martega.mybigcommerce.com/compare" method="POST" data-product-compare="">
            <ul class="productGrid row pro-margin">
                
                
                @if($category->products)
                @foreach($category->products as $pro)
                <li class="product  col-lg-4 col-md-4 col-12 ">
                    <article class="card ">
                        <figure class="card-figure text-left">
                            <a href="{{ route('product.detail',$pro->id) }}">
                                <div class="card-img-container">
                                    <img src="{{ asset('admin/dist/img/product/'.$pro->image)}}" alt="{{ $pro->name }}" title="Interdum et malesuada fames ac" data-sizes="auto"  class="card-image lazyautosizes ls-is-cached lazyloaded" sizes="194px">
                                </div>
                            </a>
                        </figure>
                        <div class="card-body text-center">
                            <div class="listdes count-des">
                                
                            </div>
                            
                            <!-- <div class="countdown--box">
                                <span data-product-id="111" data-dates="08/10/2023" class="webi-count-111"><div class="webi-timer"><div class="webi-div"><div class="webi-days countdown-amount">-445</div></div><div class="webi-div"><div class="webi-hours countdown-amount">22</div></div><div class="webi-div"><div class="webi-minutes countdown-amount">05</div></div><div class="webi-div"><div class="webi-seconds countdown-amount">26</div></div></div></span>
                            </div> -->
                            <h3 class="card-title">
                                <a href="{{ route('product.detail',$pro->id) }}">{{ $pro->name }}</a>
                            </h3>
                            <div class="card-text card-rating" data-test-info-type="productRating">
                                <span class="rating--small">
                                    <div class="comments_note wb-list-product-reviews">
                                        <span class="avg-rate bg-re3">
                                            <span class="or-rate winter-review">
                                                <span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><!-- snippet location product_rating -->
                                            </span>
                                        </span>
                                    </div>
                                </span>
                            </div>
                            
                            
                            <div class="card-text" data-test-info-type="price">
                                
                                <div class="price-section d-inline-block price-section--withoutTax rrp-price--withoutTax" style="display: none;">
                                    
                                    <span data-product-rrp-price-without-tax="" class="price price--rrp"> 
                                        
                                    </span>
                                </div>
                                
                                <div class="price-section d-inline-block price-section--withoutTax">
                                    <span class="price-label">
                                        
                                    </span>
                                    <span class="price-now-label" style="display: none;">
                                        
                                    </span>
                                    <span data-product-price-without-tax="" class="price price--withoutTax"> {{ $pro->price }} PKR</span>
                                </div>
                                <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax" style="display: none;">
                                    
                                    <span data-product-non-sale-price-without-tax="" class="price price--non-sale">
                                        
                                    </span>
                                </div>
                            </div>
                            
                            <figcaption class="card-figcaption">
                                <div class="card-figcaption-body">
                                    <div class="top-btn">
                                        <a href="#" title="Add to Cart" data-event-type="product-click" class="cartb button button--small card-figcaption-button"  data-product-id="{{ $pro->id }}"><svg width="20px" height="20px"><use xlink:href="#pcart"></use></svg></a>
                                        <!-- <div class="bwish">
                                            <form action="/wishlist.php?action&#x3D;add&amp;product_id&#x3D;111" class="form-wishlist form-action card-figcaption-button" data-wishlist-add method="post">     
                                                <button type="submit" value="Add to My Wish List" title="Add to My Wish List">
                                                    <svg width="18px" height="18px"> <use xlink:href="#bwish"></use></svg>
                                                </button>
                                            </form>
                                        </div> -->
                                        
                                        <button class="button button--small card-figcaption-button quickview" data-product-id="111"><!-- Quick view --><svg width="19px" height="19px"><use xlink:href="#quick"></use></svg></button>
                                        <label class="button button--small card-figcaption-button bcom" for="compare-111" title="Compare">
                                            <svg width="18px" height="18px"> <use xlink:href="#bcom"></use></svg><input class="wb-compare" type="checkbox" name="products[]" value="111" id="compare-111" data-compare-id="111">
                                        </label>
                                    </div>
                                </div>
                            </figcaption>
                        </div>
                    </article>
                </li>
                
                
                @endforeach
                @endif
                
                <!-- One Li end -->
                
                
                
            </ul>
            
            <ul class="productList">
                
                
                @if($category->products)
                @foreach($category->products as $pro)
                <li class="product">
                    <article class="listItem">
                        <figure class="listItem-figure">
                            <img class="listItem-image lazyload" data-sizes="auto" src="{{ asset('admin/dist/img/product/'.$pro->image)}}" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac">
                            <!--<img src="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/111/387/2__974632707.jpg?c=1" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac" class="second-img">-->
                        </figure>
                        <div class="listItem-body">
                            <div class="listItem-content">
                                <div>
                                    
                                    <div class="listItem-brand">{{ $pro->brand }}</div>
                                    <h4 class="listItem-title">
                                        <a href="{{ route('product.detail',$pro->id) }}">{{ $pro->name }}</a>
                                    </h4>
                                    <div class="listItem-rating card-rating"><div class="comments_note wb-list-product-reviews">
                                        <span class="avg-rate bg-re3">
                                            <span class="or-rate winter-review">
                                                <span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><!-- snippet location product_rating -->
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="listdes">[shortcode][countdown]08/10/2023[/countdown][/shortcode]Sed in feugiat turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla facilisi. Vivamus nisi nisl, eleifend a pharetra at, viverra ac ipsum. Ut nisi magna, ornare pharetra mi...</div> -->
                                <div class="listItem-price">
                                    <div class="price-section d-inline-block price-section--withoutTax rrp-price--withoutTax" style="display: none;">
                                        
                                        <span data-product-rrp-price-without-tax="" class="price price--rrp"> 
                                            
                                        </span>
                                    </div>
                                    
                                    <div class="price-section d-inline-block price-section--withoutTax">
                                        <span class="price-label">
                                            
                                        </span>
                                        <span class="price-now-label" style="display: none;">
                                            
                                        </span>
                                        <span data-product-price-without-tax="" class="price price--withoutTax">{{ $pro->price }} PKR</span>
                                    </div>
                                    <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax" style="display: none;">
                                        
                                        <span data-product-non-sale-price-without-tax="" class="price price--non-sale">
                                            
                                        </span>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <figcaption class="card-figcaption">
                                <div class="card-figcaption-body">
                                    <a href="../cart.html?action=add&amp;product_id=111" title="Add to Cart" data-event-type="product-click" class="button button--small card-figcaption-button"><svg width="20px" height="20px"><use xlink:href="#pcart"></use></svg></a>
                                    <!-- <div class="bwish">
                                        <form action="/wishlist.php?action&#x3D;add&amp;product_id&#x3D;111" class="form-wishlist form-action card-figcaption-button" data-wishlist-add method="post">     
                                            <button type="submit" value="Add to My Wish List" title="Add to My Wish List">
                                                <svg width="18px" height="18px"> <use xlink:href="#bwish"></use></svg>
                                            </button>
                                        </form>
                                    </div> -->
                                    <button class="button button--small card-figcaption-button quickview" data-product-id="111"><!-- Quick view --><svg width="19px" height="19px"><use xlink:href="#quick"></use></svg></button>
                                    <label class="button button--small card-figcaption-button bcom" for="compare-111" title="Compare">
                                        <svg width="18px" height="18px"> <use xlink:href="#bcom"></use></svg><input class="wb-compare" type="checkbox" name="products[]" value="111" id="compare-111" data-compare-id="111">
                                    </label>
                                </div>
                            </figcaption>
                        </div>
                    </div>
                </article>
            </li>
            
            @endforeach
            @endif
            
            
        </ul>
    </form>
    
    <nav class="pagination" aria-label="pagination">
        <ul class="pagination-list">
            
        </ul>
    </nav>
    <div data-content-region="category_below_content"></div>
</main>
</div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        
        $("#gridProduct").on("click",function(){
            $("gridlist").val("gridProduct");
        });
        
        $("#listProduct").on("click",function(){
            $("gridlist").val("gridProduct");
        });
        
        $('.cartb').on('click', function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id'); 
            
            $.ajax({
                url: '/cart/add',
                method: 'POST',
                data: {
                    product_id: productId,
                    quantity: 1,
                    operation:'increase',
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log("Response Data",response);
                    singleCartUI(response.cart,response.cart_count,response.cart_total,response.tax,response.total);
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
        });
        
        // Handle the sorting functionality
        
        $("#sort").on("change", function(e) {
            e.preventDefault();
            var sort = $("#sort").val();
            var categoryId = $("#category").val(); 
            
            $.ajax({
                url: '/searchitem',
                method: 'POST',
                data: {
                    sort: sort,
                    category_id: categoryId,
                    _token: '{{ csrf_token() }}' 
                },
                success: function(response) {
                    if (response.success) {
                        var productHtml = '';
                        $.each(response.items, function(index, pro) {
                            productHtml += `
                            <li class="product col-lg-4 col-md-4 col-12">
                                <article class="card">
                                    <figure class="card-figure text-left">
                                        <a href="../smith-journal-13/index.html">
                                            <div class="card-img-container">
                                                <img src="/admin/dist/img/product/${pro.image}" alt="${pro.name}" title="${pro.name}" data-sizes="auto" class="card-image lazyautosizes ls-is-cached lazyloaded" sizes="194px">
                                            </div>
                                        </a>
                                    </figure>
                                    <div class="card-body text-center">
                                        <div class="listdes count-des"></div>
                                        <h3 class="card-title">
                                            <a href="#">${pro.name}</a>
                                        </h3>
                                        <div class="card-text card-rating">
                                            <span class="rating--small">
                                                <div class="comments_note wb-list-product-reviews">
                                                    <span class="avg-rate bg-re3">
                                                        <span class="or-rate winter-review">
                                                            <span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span>
                                                            <span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span>
                                                            <span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span>
                                                            <span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span>
                                                            <span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </span>
                                        </div>
                                        <div class="card-text" data-test-info-type="price">
                                            <div class="price-section d-inline-block price-section--withoutTax">
                                                <span data-product-price-without-tax="" class="price price--withoutTax">${pro.price} PKR</span>
                                            </div>
                                        </div>
                                        <figcaption class="card-figcaption">
                                            <div class="card-figcaption-body">
                                                <div class="top-btn">
                                                    <a href="#" title="Add to Cart" data-event-type="product-click" class="cartb button button--small card-figcaption-button" data-product-id="${pro.id}">
                                                        <svg width="20px" height="20px"><use xlink:href="#pcart"></use></svg>
                                                    </a>
                                                    <button class="button button--small card-figcaption-button quickview" data-product-id="${pro.id}">
                                                        <svg width="19px" height="19px"><use xlink:href="#quick"></use></svg>
                                                    </button>
                                                    <label class="button button--small card-figcaption-button bcom" for="compare-${pro.id}" title="Compare">
                                                        <svg width="18px" height="18px"><use xlink:href="#bcom"></use></svg>
                                                        <input class="wb-compare" type="checkbox" name="products[]" value="${pro.id}" id="compare-${pro.id}" data-compare-id="${pro.id}">
                                                    </label>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </div>
                                </article>
                            </li>
                        `;
                        });
                        $('.productGrid').html(productHtml);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("AJAX error status:", status);
                    console.log("XHR response:", xhr.responseText);
                    console.log("Error message:", error);
                    alert('Error: ' + xhr.responseText);
                }
            });
        });
    });
    
</script>
@endpush
@endsection