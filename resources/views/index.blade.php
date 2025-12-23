@extends('layouts.app')
@section('content')

<section class="heroCarousel" data-slick='{

    "dots": true,
    "slidesToShow": 1,
    "slidesToScroll": 1,
    "autoplay": false,
    "autoplaySpeed": 5000,

    "slide": ".js-hero-slide",
    "prevArrow": ".js-hero-prev-arrow",
    "nextArrow": ".js-hero-next-arrow"
}'>
        <!--
    <button aria-label="Go to slide [NUMBER] of 2" class="js-hero-prev-arrow slick-prev slick-arrow">hero-prev-arrow</button>
-->

@if(Session::has('order_success'))
    <p class="alert alert-success">{{ Session::get('order_success') }}</p>
@endif
<div class="js-hero-slide">
    <a href="#" aria-label="Slide number 1">
        <div class="slide-flex heroCarousel-slide  heroCarousel-slide--first">
            <div class="heroCarousel-image-wrapper slideimg">
                <img src="../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/carousel/8/s1__870162707.jpg?c=1"
                alt="" title="" data-sizes="auto"
                srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/carousel/8/s1__87016.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/carousel/8/s1__87016.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/carousel/8/s1__87016.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/carousel/8/s1__87016.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/carousel/8/s1__87016.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1218w/carousel/8/s1__87016.jpg?c=1 1218w"
                class=" heroCarousel-image" />
            </div>
            <div class="slidecap">
                <div class="slidedes">
                    <div class="heroCarousel-content">
                        <span class="heroCarousel-title">New Macbook Pro</span>
                        <hr class="slider-fihr">
                        <hr class="slider-sehr">
                        <p class="heroCarousel-description">upto 40% off on This Season</p>
                        <span class="heroCarousel-action button button--primary button--large">Shop Now</span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="js-hero-slide">
    <a href="#" aria-label="Slide number 2">
        <div class="slide-flex heroCarousel-slide  ">
            <div class="heroCarousel-image-wrapper slideimg">
                <img src="../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/carousel/9/S22707.jpg?c=1"
                alt="" title="" data-sizes="auto"
                srcset="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/carousel/9/S2.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/carousel/9/S2.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/carousel/9/S2.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/carousel/9/S2.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/carousel/9/S2.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1218w/carousel/9/S2.jpg?c=1 1218w"
                class="lazyload heroCarousel-image" loading="lazy" />
            </div>
            <div class="slidecap">
                <div class="slidedes">
                    <div class="heroCarousel-content">
                        <span class="heroCarousel-title">New Camera Pro</span>
                        <hr class="slider-fihr">
                        <hr class="slider-sehr">
                        <p class="heroCarousel-description">upto 50% off on This Season</p>
                        <span class="heroCarousel-action button button--primary button--large">Shop Now</span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

        <!--
    <button aria-label="Go to slide [NUMBER] of 2" class="js-hero-next-arrow slick-next slick-arrow">hero-next-arrow</button>
-->
</section>

<div class="cate-bg">
    <div class="homecategory cate-row">
        <div class="all-cate caro-btn topsp">
            <nav class="home-cate">
                <ul class="row">
                    <div id="homecate" class="owl-carousel owl-thme">
                        @if ($categories)
                        @foreach ($categories as $cat)
                        <div class="home-cate-item col-12">
                            <div class="catebg">
                                <div class="cate-img">
                                    <a class="" href="{{ route('category', ['id' => $cat->id]) }}"><img
                                        src="{{ asset('admin/dist/img/' . $cat->image) }}"></a>
                                    </div>
                                    <div class="text-center cpton-p">
                                        <div class="cate-ti">
                                            <h2 class="catename"><a
                                                href="{{ route('category', ['id' => $cat->id]) }}">{{ $cat->name }}</a>
                                            </h2>
                                            <a class="catelink"
                                            href="{{ route('category', ['id' => $cat->id]) }}">View All</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#homecate").owlCarousel({
                itemsCustom: [
                [0, 1],
                [320, 2],
                [575, 3],
                [768, 3],
                [992, 3],
                [1200, 4],
                [1410, 5],
                [1589, 5]
                ],
                autoPlay: 4000,
                navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                navigation: false,
                pagination: false
            });
        });
    </script>
    <div class="all-re">
        <div class="home-heading  page-heading text-left">
            <h1><span>Featured Product</span></h1><span class="offba">Hurry Up! Deal End</span>
        </div>
        <div class="pro-margin next-prevb row fea-pro" data-product-type="featured">
            <section class="productCarousel" data-list-name=""
            data-slick='{
                "dots": false,
                "infinite": false,
                "mobileFirst": true,
                "slidesToShow": 2,
                "rows": 1,
                "prevArrow": ".js-product-prev-arrow-featured",
                "nextArrow": ".js-product-next-arrow-featured",
                "responsive": [
                {
                    "breakpoint": 1409,
                    "settings": {
                        "slidesToScroll": 1,
                        "slidesToShow": 5
                    }
                },
                {
                    "breakpoint": 1199,
                    "settings": {
                        "slidesToScroll": 1,
                        "slidesToShow": 4
                    }
                },
                {
                    "breakpoint": 991,
                    "settings": {
                        "slidesToScroll": 1,
                        "slidesToShow": 3
                    }
                },
                {
                    "breakpoint": 767,
                    "settings": {
                        "slidesToScroll": 1,
                        "slidesToShow": 3
                    }
                },
                {
                    "breakpoint": 599,
                    "settings": {
                        "slidesToScroll": 1,
                        "slidesToShow": 3
                    }
                },
                {
                    "breakpoint": 411,
                    "settings": {
                        "slidesToScroll": 1,
                        "slidesToShow": 2
                    }
                }
                ]
            }'>

            @if ($products)
            @foreach ($products as $pro)
            <div class="productCarousel-slide js-product-slide col-12">
                <article class="card ">
                    <figure class="card-figure text-left">
                     <a href="{{ route('product.detail',$pro->id) }}"  class="cartb">
                        <div class="card-img-container">
                            <img src="{{ asset('admin/dist/img/product/' . $pro->image) }}"
                            alt="{{ $pro->name }}" title="{{ $pro->name }}" data-sizes="auto"
                            srcset="{{ asset('admin/dist/img/product/' . $pro->image) }}"
                            data-srcset="{{ asset('admin/dist/img/product/' . $pro->image) }}"
                            class="lazyload card-image" />
                        </div>
                        <img src="{{ asset('admin/dist/img/product/' . $pro->image) }}"
                        alt="{{ $pro->name }}" title="{{ $pro->name }}" class="second-img">
                    </a>
                </figure>
                <div class="card-body text-center">
                    <div class="listdes count-des">

                    </div>
                    <h3 class="card-title">
                        <a href="#">{{ $pro->name }}</a>
                    </h3>
                    <div class="card-text card-rating" data-test-info-type="productRating">
                        <span class="rating--small">
                            <div class="comments_note wb-list-product-reviews">
                                <span class="avg-rate bg-re3">
                                    <span class="or-rate winter-review">
                                        <span class="icon icon--ratingEmpty"><i
                                            class="fa fa-star-o"></i></span><span
                                            class="icon icon--ratingEmpty"><i
                                            class="fa fa-star-o"></i></span><span
                                            class="icon icon--ratingEmpty"><i
                                            class="fa fa-star-o"></i></span><span
                                            class="icon icon--ratingEmpty"><i
                                            class="fa fa-star-o"></i></span><span
                                            class="icon icon--ratingEmpty"><i
                                            class="fa fa-star-o"></i></span><!-- snippet location product_rating -->
                                        </span>
                                    </span>
                                </div>
                            </span>
                        </div>
                        <div class="card-text" data-test-info-type="price">
                            <div class="price-section d-inline-block price-section--withoutTax rrp-price--withoutTax"
                            style="display: none;">
                            <span data-product-rrp-price-without-tax class="price price--rrp">
                            </span>
                        </div>
                        <div class="price-section d-inline-block price-section--withoutTax">
                            <span class="price-label">

                            </span>
                            <span class="price-now-label" style="display: none;">

                            </span>
                            <span data-product-price-without-tax
                            class="price price--withoutTax">${{ $pro->price }}</span>
                        </div>
                        <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax"
                        style="display: none;">

                        <span data-product-non-sale-price-without-tax class="price price--non-sale">

                        </span>
                    </div>
                </div>
                <figcaption class="card-figcaption">
                    <div class="card-figcaption-body">
                        <div class="top-btn">
                            <a href="javascript:void(0)" title="Add to Cart"
                            class="cartb button button--small card-figcaption-button"  onclick="addToCart({{ $pro->id }})" ><svg
                            width="20px" height="20px">
                            <use xlink:href="#pcart"></use>
                        </svg></a>
                                                        <!-- <div class="bwish">
                                    <form action="/wishlist.php?action&#x3D;add&amp;product_id&#x3D;111" class="form-wishlist form-action card-figcaption-button" data-wishlist-add method="post">
                                    <button type="submit" value="Add to My Wish List" title="Add to My Wish List">
                                    <svg width="18px" height="18px"> <use xlink:href="#bwish"></use></svg>
                                    </button>
                                    </form>
                                </div> -->

                                <button class="button button--small card-figcaption-button quickview"
                                data-product-id="111"><!-- Quick view --><svg width="19px"
                                height="19px">
                                <use xlink:href="#quick"></use>
                            </svg></button>
                            <label class="button button--small card-figcaption-button bcom"
                            for="compare-111" title="Compare">
                            <svg width="18px" height="18px">
                                <use xlink:href="#bcom"></use>
                            </svg><input class="wb-compare" type="checkbox" name="products[]"
                            value="111" id="compare-111" data-compare-id="111">
                        </label>
                    </div>
                </div>
            </figcaption>
        </div>
    </article>
</div>
@endforeach
@endif
</section>
<div class="all-btn">
    <button aria-label="Go to slide [NUMBER] of 6"
    class="js-product-prev-arrow-featured slick-prev slick-arrow"><i
    class="fa fa-angle-left"></i></button>
    <button aria-label="Go to slide [NUMBER] of 6"
    class="js-product-next-arrow-featured slick-next slick-arrow"><i
    class="fa fa-angle-right"></i></button>
</div>
</div>
</div>
<div data-content-region="home_below_featured_products"></div>

<div class="img-banner-des">
    <div class="imgbanner">
        <div class="row">
            <div class="img-banner col-sm-6 col-12">
                <div class="beffect">
                    <a href="#"><img class="img-fluid lazyload" data-sizes="auto"
                        src="https://cdn11.bigcommerce.com/s-3h97v0q79m/stencil/f0538030-fec3-013a-08a5-46249ff3dc17/e/dcd9c960-7994-0139-1126-4680591ce24d/img/loading.svg"
                        data-src="https://cdn11.bigcommerce.com/s-3h97v0q79m/product_images/uploaded_images/594x290-1.jpg"
                        alt="" /></a>
                    </div>
                </div>
                <div class="img-banner col-sm-6 col-12">
                    <div class="beffect">
                        <a href="#"><img class="img-fluid lazyload" data-sizes="auto"
                            src="https://cdn11.bigcommerce.com/s-3h97v0q79m/stencil/f0538030-fec3-013a-08a5-46249ff3dc17/e/dcd9c960-7994-0139-1126-4680591ce24d/img/loading.svg"
                            data-src="https://cdn11.bigcommerce.com/s-3h97v0q79m/product_images/uploaded_images/594x290-2.jpg"
                            alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="all-re">
            <div class="home-heading  page-heading text-left">
                <h1><span>Most Popular</span></h1>
            </div>
            <ul class="pro-margin next-prevb row" data-product-type="top_sellers">
                <section class="productCarousel" data-list-name=""
                data-slick='{
                    "dots": false,
                    "infinite": false,
                    "mobileFirst": true,
                    "slidesToShow": 2,
                    "slidesToScroll": 1,
                    "slide": ".js-product-slide",
                    "prevArrow": ".js-product-prev-arrow-top",
                    "nextArrow": ".js-product-next-arrow-top",
                    "responsive": [
                    {
                        "breakpoint": 1409,
                        "settings": {
                            "slidesToScroll": 1,
                            "slidesToShow": 5
                        }
                    },
                    {
                        "breakpoint": 1199,
                        "settings": {
                            "slidesToScroll": 1,
                            "slidesToShow": 4
                        }
                    },
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToScroll": 1,
                            "slidesToShow": 3
                        }
                    },
                    {
                        "breakpoint": 767,
                        "settings": {
                            "slidesToScroll": 1,
                            "slidesToShow": 3
                        }
                    },
                    {
                        "breakpoint": 599,
                        "settings": {
                            "slidesToScroll": 1,
                            "slidesToShow": 3
                        }
                    },
                    {
                        "breakpoint": 411,
                        "settings": {
                            "slidesToScroll": 1,
                            "slidesToShow": 2
                        }
                    }
                    ]
                }'>
                @if ($products)
                @foreach ($products as $pro)
                <div class="productCarousel-slide js-product-slide col-12">
                    <article class="card ">
                        <figure class="card-figure text-left">
                            <a href="#">
                                <div class="card-img-container">
                                    <img src="{{ asset('admin/dist/img/product/' . $pro->image) }}"
                                    alt="magna vitae molestie semper" title="magna vitae molestie semper"
                                    data-sizes="auto"
                                    srcset="{{ asset('admin/dist/img/product/' . $pro->image) }}"
                                    data-srcset="{{ asset('admin/dist/img/product/' . $pro->image) }}"
                                    class="lazyload card-image" />
                                </div>
                                <img src="{{ asset('admin/dist/img/product/' . $pro->image) }}"
                                alt="magna vitae molestie semper" title="magna vitae molestie semper"
                                class="second-img">
                            </a>
                        </figure>
                        <div class="card-body text-center">
                            <div class="listdes count-des">

                            </div>
                            <!--  <span data-product-id="111ddd" data-dates="5/10/2023" class="webi-count-111ss"><div class="webi-timer"><div class="webi-div"><div class="webi-days countdown-amount">823</div></div><div class="webi-div"><div class="webi-hours countdown-amount">12</div></div><div class="webi-div"><div class="webi-minutes countdown-amount">47</div></div><div class="webi-div"><div class="webi-seconds countdown-amount">01</div></div></div></span> -->
                                    <!--
    <p class="card-text" data-test-info-type="brandName">OFS</p>
-->
<h3 class="card-title">
    <a href="#">{{ $pro->name }}</a>
</h3>
<div class="card-text card-rating" data-test-info-type="productRating">
    <span class="rating--small">
        <div class="comments_note wb-list-product-reviews">
            <span class="avg-rate bg-re3">
                <span class="or-rate winter-review">
                    <span class="icon icon--ratingEmpty"><i
                        class="fa fa-star-o"></i></span><span
                        class="icon icon--ratingEmpty"><i
                        class="fa fa-star-o"></i></span><span
                        class="icon icon--ratingEmpty"><i
                        class="fa fa-star-o"></i></span><span
                        class="icon icon--ratingEmpty"><i
                        class="fa fa-star-o"></i></span><span
                        class="icon icon--ratingEmpty"><i
                        class="fa fa-star-o"></i></span><!-- snippet location product_rating -->
                    </span>
                </span>
            </div>
        </span>
    </div>


    <div class="card-text" data-test-info-type="price">

        <div class="price-section d-inline-block price-section--withoutTax rrp-price--withoutTax"
        style="display: none;">

        <span data-product-rrp-price-without-tax class="price price--rrp">

        </span>
    </div>

    <div class="price-section d-inline-block price-section--withoutTax">
        <span class="price-label">

        </span>
        <span class="price-now-label" style="display: none;">

        </span>
        <span data-product-price-without-tax
        class="price price--withoutTax">₹225.00</span>
    </div>
    <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax"
    style="display: none;">

    <span data-product-non-sale-price-without-tax class="price price--non-sale">

    </span>
</div>
</div>

<figcaption class="card-figcaption">
    <div class="card-figcaption-body">
        <div class="top-btn">
            <a href="javascript:void(0)" title="Add to Cart" onclick="addToCart({{ $pro->id }})"
                class="cartb button button--small card-figcaption-button"><svg
                width="20px" height="20px">
                <use xlink:href="#pcart"></use>
            </svg></a>
                                                <!-- <div class="bwish">
    <form action="/wishlist.php?action&#x3D;add&amp;product_id&#x3D;86" class="form-wishlist form-action card-figcaption-button" data-wishlist-add method="post">
    <button type="submit" value="Add to My Wish List" title="Add to My Wish List">
    <svg width="18px" height="18px"> <use xlink:href="#bwish"></use></svg>
    </button>
    </form>
</div> -->

<button class="button button--small card-figcaption-button quickview"
data-product-id="86"><!-- Quick view --><svg width="19px"
height="19px">
<use xlink:href="#quick"></use>
</svg></button>
<label class="button button--small card-figcaption-button bcom"
for="compare-86" title="Compare">
<svg width="18px" height="18px">
    <use xlink:href="#bcom"></use>
</svg><input class="wb-compare" type="checkbox" name="products[]"
value="86" id="compare-86" data-compare-id="86">
</label>
</div>
</div>
</figcaption>
</div>
</article>
</div>
@endforeach
@endif

</section>
</ul>
</div>





<div class="all-re">
    <div class="home-heading  page-heading text-left">
        <h1><span>Popular Blogs</span></h1>
    </div>
</div>
@if ($blogs)
<div class="row">
    @foreach ($blogs as $blog)
    <div class="productCarousel-slide js-product-slide col-md-4 col-6">
        <div class="blog-thumbnail">
            <div class="blogb">
                <div class="">
                    <div class="blog-hover">
                        <a href="{{ route('blogdetail', ['blog' => $blog->id]) }}" class="wb-blog-img">
                            <img src="{{ asset('admin/dist/img/' . $blog->image) }}" alt="{{ $blog->heading }}"
                            title="{{ $blog->heading }}">
                        </a>
                        <div class="webi_post_hover">
                            <div class="blog-ic">
                                <a class="icon readmore_link" title="all blog" href="{{ route('blogs') }}"><i
                                    class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="auther-date">
                                <span class="blog-date">17th Feb 2021</span>
                            </div>
                        </div>
                    </div>
                    <div class="blogd">
                        <div class="blog-con text-left">
                            <div class="wb-blog-author"><span><i class="fa fa-user-o"></i> Admin</span></div>
                            <div class="wb-blog-title">
                                <a href="{{ route('blogdetail', ['blog' => $blog->id]) }}"> {{ $blog->heading }}</a>
                            </div>

                            <div class="wb-blog-desc">
                                {{ $blog->description }}
                            </div>
                            <a href="{{ route('blogdetail', ['blog' => $blog->id]) }}"
                                class="wb-blog-read-more btn-ef">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div> <!-- end row -->
        @endif

        @push('scripts')
        <script type="text/javascript">    
            window.addToCart=function(productId){
                $.ajax({
                    url: '/cart/add',
                    method: 'POST',
                    data: {
                        product_id: productId,
                        quantity: 1,
                        _token: '{{ csrf_token() }}',
                        operation:'increase',
                    },
                    success: function(response) {
                       alert('Product Added Into the cart');
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
            }
        </script>
        @endpush
@endsection
