<?php 
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\DeliveryInfo;
use App\Models\Product;
$categories=Category::all();
$testimonials=Testimonial::all();
$deliveryinfos=DeliveryInfo::all();
$products=Product::all();
?>
<!-- Main Row Start -->
    
    <aside class="page-sidebar col-sm-12 col-lg-3 col-md-3 col-12 ">
    <div class="navPages-container" id="menu" data-menu>
    <nav class="navPages">
    <div id="pt_vegamenu" class="title-menu wr-left-menu">
    <div id="wr-menu-icon">
    <div class="wr-menu">
    <button class="btn-navbar navbar-toggle" type="button">
    <i class="fa fa-bars"></i>
    </button>
    <span class="cate">Categories</span>
    </div>
    </div>
    </div>
    <ul class="navPages-list">
    @if($categories)
        @foreach($categories as $category)
            <li class="navPages-item">
                <a class="navPages-action"
                   href="{{ route('category', ['id' => $category->id]) }}"
                   aria-label="{{ $category->name }}">
                   {{ $category->name }}
                </a>
            </li>
        @endforeach
    @endif
</ul>

    <!--     <ul class="navPages-list navPages-list--user">
    <li class="navPages-item">
    <a class="navPages-action has-subMenu"
    href="#"
    data-collapsible="navPages-currency"
    aria-controls="navPages-currency"
    aria-expanded="false"
    aria-label="INR"
    >
    INR
    <i class="icon navPages-action-moreIcon" aria-hidden="true">
    <svg>
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-chevron-down"></use>
    </svg>
    </i>
    </a>
    <div class="navPage-subMenu" id="navPages-currency" aria-hidden="true" tabindex="-1">
    <ul class="navPage-subMenu-list">
    <li class="navPage-subMenu-item">
    <a class="navPage-subMenu-action navPages-action"
    href="https://martega.mybigcommerce.com/?setCurrencyId=1"
    aria-label="Indian Rupee"
    >
    <strong>Indian Rupee</strong>
    </a>
    </li>
    <li class="navPage-subMenu-item">
    <a class="navPage-subMenu-action navPages-action"
    href="https://martega.mybigcommerce.com/?setCurrencyId=2"
    aria-label="US Dollar"
    >
    US Dollar
    </a>
    </li>
    </ul>
    </div>
    </li>
    
    <li class="navPages-item">
    <a class="navPages-action navPages-action--compare"
    href="/compare"
    data-compare-nav
    aria-label="Compare"
    >
    Compare
    <span class="countPill countPill--positive countPill--alt"></span>
    </a>
    </li>
    
    <li class="navPages-item">
    <a class="navPages-action"
    href="/login.php"
    aria-label="Sign in"
    >
    Sign in
    </a>
    or
    <a class="navPages-action"
    href="/login.php?action&#x3D;create_account"
    aria-label="Register"
    >
    Register
    </a>
    </li>
    <li class="navPages-item">
    <ul class="socialLinks socialLinks--alt">
    <li class="socialLinks-item icon--twitter">
    <a class="icon" href="http://#" rel="noopener">
    <svg><use xlink:href="#icon-twitter" /></svg>
    </a>
    </li>
    <li class="socialLinks-item icon--facebook">
    <a class="icon" href="http://#" rel="noopener">
    <svg><use xlink:href="#icon-facebook" /></svg>
    </a>
    </li>
    <li class="socialLinks-item icon--linkedin">
    <a class="icon" href="http://#" rel="noopener">
    <svg><use xlink:href="#icon-linkedin" /></svg>
    </a>
    </li>
    <li class="socialLinks-item icon--instagram">
    <a class="icon" href="http://#" rel="noopener">
    <svg><use xlink:href="#icon-instagram" /></svg>
    </a>
    </li>
    <li class="socialLinks-item icon--youtube">
    <a class="icon" href="http://#" rel="noopener">
    <svg><use xlink:href="#icon-youtube" /></svg>
    </a>
    </li>
    </ul>
    </li>
    </ul> -->
    </nav>
    </div>
    

    <div class="new-pro">
    <div class="rtlleft">
    <div class="home-heading  page-heading text-left"><h1><span>New Products</span></h1></div>
    <ul class="pro-margin next-prevb row" data-product-type="new" >
    <section class="productCarousel"
    data-list-name="New Products"
    data-slick='{
        "dots": false,
        "infinite": false,        
        "mobileFirst": true,
        "slidesToShow": 1,
        "rows": 7,
        "slidesToScroll": 1,        
        "prevArrow": ".js-product-prev-arrow",
        "nextArrow": ".js-product-next-arrow",
        "responsive": [
        {
            "breakpoint": 1409,
            "settings": {
                "slidesToScroll": 1,
                "slidesToShow": 1
            }
        },
        {
            "breakpoint": 1199,
            "settings": {
                "slidesToScroll": 1,
                "slidesToShow": 1
            }
        },
        {
            "breakpoint": 991,
            "settings": {
                "slidesToScroll": 1,
                "slidesToShow": 1
            }
        },
        {
            "breakpoint": 767,
            "settings": {
                "slidesToScroll": 1,
                "slidesToShow": 1
            }
        },
        {
            "breakpoint": 599,
            "settings": {
                "slidesToScroll": 1,
                "slidesToShow": 2
            }
        },
        {
            "breakpoint": 0,
            "settings": {
                "slidesToScroll": 1,
                "slidesToShow": 1
            }
        }
        ]
    }'>

    @if($products)
        @foreach($products as $pro)
                <div class="productCarousel-slide js-product-slide col-12">
            <article class="new-card card " >
            <div class="row">
            <figure class="card-figure text-center col-5">
            <a href="{{ route('product',$pro->id)}}" >
            <div class="card-img-container">
            <img src="{{ asset('admin/dist/img/product/'.$pro->image)}}" alt="{{ $pro->name }}" title="{{ $pro->name }}" data-sizes="auto"
            srcset="{{ asset('admin/dist/img/product/'.$pro->image)}}"
            data-srcset="{{ asset('admin/dist/img/product/'.$pro->image)}}"
            class="lazyload card-image"

            />
            </div>
            </a>
            </figure>
            <div class="card-body text-left col-7">
            <!-- 
            <p class="card-text" data-test-info-type="brandName">Sagaform</p>
            -->
            <h3 class="card-title">
            <a href="{{ route('product',$pro->id)}}">{{ $pro->name }}</a>
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
            
            <span data-product-rrp-price-without-tax class="price price--rrp"> 
            
            </span>
            </div>

            <div class="price-section d-inline-block price-section--withoutTax" >
            <span class="price-label" >
            
            </span>
            <span class="price-now-label" style="display: none;">
            
            </span>
            <span data-product-price-without-tax class="price price--withoutTax">{{ $pro->price }}</span>
            </div>
            <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax" style="display: none;">
            
            <span data-product-non-sale-price-without-tax class="price price--non-sale">
            
            </span>
            </div>
            </div>
            </div>
            </div>
            </article>
            </div>
        @endforeach
    @endif
    
    <div class="productCarousel-slide js-product-slide col-12">
    <article class="new-card card " >
    <div class="row">
    <figure class="card-figure text-center col-5">
    <a href="dustpan-brush/index.html" >
    <div class="card-img-container">
    <img src="../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/107/390/3__646872707.jpg?c=1" alt="Etiam vehicula gravida commodo" title="Etiam vehicula gravida commodo" data-sizes="auto"
    srcset="../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/107/390/3__646872707.jpg?c=1"
    data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/107/390/3__64687.1613648204.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/107/390/3__64687.1613648204.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/107/390/3__64687.1613648204.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/107/390/3__64687.1613648204.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/107/390/3__64687.1613648204.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/107/390/3__64687.1613648204.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/107/390/3__64687.1613648204.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/107/390/3__64687.1613648204.jpg?c=1 2560w"

    class="lazyload card-image"

    />
    </div>
    </a>
    </figure>
    <div class="card-body text-left col-7">
    <!-- 
    <p class="card-text" data-test-info-type="brandName">OFS</p>
    -->
    <h3 class="card-title">
    <a href="dustpan-brush/index.html" >Etiam vehicula gravida commodo</a>
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
    
    <span data-product-rrp-price-without-tax class="price price--rrp"> 
    
    </span>
    </div>

    <div class="price-section d-inline-block price-section--withoutTax" >
    <span class="price-label" >
    
    </span>
    <span class="price-now-label" style="display: none;">
    
    </span>
    <span data-product-price-without-tax class="price price--withoutTax">₹34.95</span>
    </div>
    <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax" style="display: none;">
    
    <span data-product-non-sale-price-without-tax class="price price--non-sale">
    
    </span>
    </div>
    </div>
    </div>
    </div>
    </article>
    </div>
    <div class="productCarousel-slide js-product-slide col-12">
    <article class="new-card card " >
    <div class="row">
    <figure class="card-figure text-center col-5">
    <a href="utility-caddy/index.html" >
    <div class="card-img-container">
    <img src="../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/104/399/7__270012707.jpg?c=1" alt="Donec congue bibendum viverra" title="Donec congue bibendum viverra" data-sizes="auto"
    srcset="../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/104/399/7__270012707.jpg?c=1"
    data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/104/399/7__27001.1613648281.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/104/399/7__27001.1613648281.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/104/399/7__27001.1613648281.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/104/399/7__27001.1613648281.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/104/399/7__27001.1613648281.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/104/399/7__27001.1613648281.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/104/399/7__27001.1613648281.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/104/399/7__27001.1613648281.jpg?c=1 2560w"

    class="lazyload card-image"

    />
    </div>
    </a>
    </figure>
    <div class="card-body text-left col-7">
    <!-- 
    <p class="card-text" data-test-info-type="brandName">OFS</p>
    -->
    <h3 class="card-title">
    <a href="utility-caddy/index.html" >Donec congue bibendum viverra</a>
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
    
    <span data-product-rrp-price-without-tax class="price price--rrp"> 
    
    </span>
    </div>

    <div class="price-section d-inline-block price-section--withoutTax" >
    <span class="price-label" >
    
    </span>
    <span class="price-now-label" style="display: none;">
    
    </span>
    <span data-product-price-without-tax class="price price--withoutTax">₹45.95</span>
    </div>
    <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax" style="display: none;">
    
    <span data-product-non-sale-price-without-tax class="price price--non-sale">
    
    </span>
    </div>
    </div>
    </div>
    </div>
    </article>
    </div>
    
    
    
    
    
    </section>
    <div class="all-btn">
    <button aria-label="Go to slide [NUMBER] of 13" class="js-product-prev-arrow slick-prev slick-arrow"><i class="fa fa-angle-left"></i></button>
    <button aria-label="Go to slide [NUMBER] of 13" class="js-product-next-arrow slick-next slick-arrow"><i class="fa fa-angle-right"></i></button>
    </div>		</ul>
    </div>
    </div>

    <div data-content-region="home_below_new_products"></div>

    <div class="parallex text-center">
    <div id="testi" class="owl-carousel owl-theme">
        @foreach ($testimonials as $testimonial)
        <div class="item">
            <img class="img-fluid center-block timg" src="{{ asset('admin/dist/img/'.$testimonial->image) }}">
            <div>
                <h2>{{ $testimonial->heading }}</h2>
                <h5>- {{ $testimonial->designation }}</h5>
                <svg width="30px" height="30px"><use xlink:href="#quote"></use></svg>
            </div>
            <p>{{ $testimonial->description }}</p>
        </div>
        @endforeach
    </div>
</div>

<script type="text/javascript">
    (function($){
        $("#testi").owlCarousel({
            itemsCustom : [
                [0, 1]
            ],
            autoPlay: false,
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            navigation : false,
            pagination:true
        });
    }(jQuery));
</script>
           
    <div class="deliveryinfo">
    <div class="row">
    @if($deliveryinfos)
        @foreach($deliveryinfos as $info)
        <div class="col-12">
            <ul class="list-unstyled">
            <!-- <li><span class="secure"><svg width="32px" height="32px"><use xlink:href="#pay"></use></svg></span></li> -->
            <li>
            <h4>{{ $info->heading }}</h4>
            <p>{{ $info->description }}</p>
            </li>
            </ul>
        </div>
        @endforeach
    @endif

    



    <!-- <div class="col-12">
    <ul class="list-unstyled">
    <li><span class="support"><svg width="32px" height="32px"><use xlink:href="#support"></use></svg></span></li>
    <li>
    <h4>24/7 Support</h4>
    <P>Dedicated 24/7 support</P>
    </li>
    </ul>
    </div>
    <div class="col-12">
    <ul class="list-unstyled">
    <li><span class="gift"><svg width="32px" height="32px"><use xlink:href="#gift"></use></svg></span></li>
    <li>
    <h4>worldwide Shipping</h4>
    <p>For all orders over $80</p>
    </li>
    </ul>
    </div>
    <div class="col-12">
    <ul class="list-unstyled">
    <li><span class="shipping"><svg width="42px" height="42px"><use xlink:href="#ship"></use></svg></span></li>
    <li>
    <h4>Special Gift Cards</h4>
    <p>Special gift upto 5 order</p>
    </li>
    </ul>
    </div> -->
    </div>
    </div>            <!--<div class="left-banner-bg-offer">
    <div class="secondleftbanner">
    <div class="beffect">
    <a href="#"><img class="img-fluid lazyload" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-3h97v0q79m/stencil/f0538030-fec3-013a-08a5-46249ff3dc17/e/dcd9c960-7994-0139-1126-4680591ce24d/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-3h97v0q79m/product_images/uploaded_images/282x490-1.jpg"  alt=""  /></a>
    </div>
    </div>
    </div>-->
    </aside>
    <!-- <div class="main full col-sm-12 col-lg-9 col-md-9 col-12 crwidth page-content">

                

    </div>
        </div> -->
        <!-- Main Row End -->