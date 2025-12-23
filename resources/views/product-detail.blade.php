@extends('layouts.app')
@section('content')
<div class="main full col-sm-12 col-lg-9 col-md-9 col-12 crwidth page-content">
    
    <nav aria-label="Breadcrumb" class="breadcrumbs-bg">
        <ol class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li class="breadcrumb " itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a class="breadcrumb-label" itemprop="item" href="../index.html">
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li class="breadcrumb " itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a class="breadcrumb-label" itemprop="item" href="../garden/index.html">
                    <span itemprop="name">{{ $product->category->name }}</span>
                </a>
                <meta itemprop="position" content="2">
            </li>
            <li class="breadcrumb is-active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a class="breadcrumb-label" itemprop="item" href="index.html" aria-current="page">
                    <span itemprop="name">{{ $product->name }}</span>
                </a>
                <meta itemprop="position" content="3">
            </li>
        </ol>
    </nav>
    
    
    <div class="productView row">
        <div class="row">
            <section class="productView-images col-md-5 col-12" data-image-gallery="">
                <figure class="productView-image is-ready" data-image-gallery-main="" data-zoom-image="{{ asset('admin/dist/img/product/' . $product->image) }}">
                    <div class="productView-img-container">
                        <a href="{{ asset('admin/dist/img/product/' . $product->image) }}" target="_blank" itemprop="image">
                            <img src="{{ asset('admin/dist/img/product/' . $product->image) }}" alt="{{ $product->name }}" title="{{ $product->name }}" data-sizes="auto" srcset="{{ asset('admin/dist/img/product/' . $product->image) }}" data-srcset="{{ asset('admin/dist/img/product/' . $product->image) }}" data-main-image="" sizes="336px">
                        </a>
                    </div>
                </figure>
                <div class="col-12">
                    <ul id="addi-img" class="productView-thumbnails owl-carousel owl-theme" style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 976px; left: 0px; display: block; transform: translate3d(-61px, 0px, 0px);"><div class="owl-item" style="width: 61px;"><li class="productView-thumbnail">
                            <a class="productView-thumbnail-link" href="{{ asset('admin/dist/img/product/' . $product->image) }}" data-image-gallery-item="" data-image-gallery-new-image-url="{{ asset('admin/dist/img/product/' . $product->image) }}" data-image-gallery-new-image-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/383/1__09725.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/383/1__09725.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/383/1__09725.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/383/1__09725.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/383/1__09725.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/383/1__09725.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/383/1__09725.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/383/1__09725.1613648130.jpg?c=1 2560w" data-image-gallery-zoom-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/383/1__097252707.jpg?c=1">
                                <img src="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/700x900/products/111/383/1__097252707.jpg?c=1" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac" data-sizes="auto" srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/383/1__09725.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/383/1__09725.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/383/1__09725.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/383/1__09725.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/383/1__09725.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/383/1__09725.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/383/1__09725.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/383/1__09725.1613648130.jpg?c=1 2560w" data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/383/1__09725.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/383/1__09725.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/383/1__09725.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/383/1__09725.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/383/1__09725.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/383/1__09725.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/383/1__09725.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/383/1__09725.1613648130.jpg?c=1 2560w" class="lazyautosizes ls-is-cached lazyloaded" sizes="49px">
                            </a>
                        </li></div><div class="owl-item" style="width: 61px;"><li class="productView-thumbnail">
                            <a class="productView-thumbnail-link" href="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/387/2__974632707.jpg?c=1" data-image-gallery-item="" data-image-gallery-new-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/111/387/2__974632707.jpg?c=1" data-image-gallery-new-image-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/387/2__97463.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/387/2__97463.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/387/2__97463.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/387/2__97463.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/387/2__97463.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/387/2__97463.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/387/2__97463.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/387/2__97463.1613648130.jpg?c=1 2560w" data-image-gallery-zoom-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/387/2__974632707.jpg?c=1">
                                <img src="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/700x900/products/111/387/2__974632707.jpg?c=1" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac" data-sizes="auto" srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/387/2__97463.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/387/2__97463.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/387/2__97463.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/387/2__97463.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/387/2__97463.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/387/2__97463.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/387/2__97463.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/387/2__97463.1613648130.jpg?c=1 2560w" data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/387/2__97463.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/387/2__97463.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/387/2__97463.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/387/2__97463.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/387/2__97463.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/387/2__97463.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/387/2__97463.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/387/2__97463.1613648130.jpg?c=1 2560w" class="lazyautosizes lazyloaded" sizes="49px">
                            </a>
                        </li></div><div class="owl-item" style="width: 61px;"><li class="productView-thumbnail">
                            <a class="productView-thumbnail-link" href="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/384/22__737282707.jpg?c=1" data-image-gallery-item="" data-image-gallery-new-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/111/384/22__737282707.jpg?c=1" data-image-gallery-new-image-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/384/22__73728.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/384/22__73728.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/384/22__73728.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/384/22__73728.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/384/22__73728.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/384/22__73728.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/384/22__73728.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/384/22__73728.1613648130.jpg?c=1 2560w" data-image-gallery-zoom-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/384/22__737282707.jpg?c=1">
                                <img src="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/700x900/products/111/384/22__737282707.jpg?c=1" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac" data-sizes="auto" srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/384/22__73728.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/384/22__73728.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/384/22__73728.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/384/22__73728.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/384/22__73728.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/384/22__73728.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/384/22__73728.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/384/22__73728.1613648130.jpg?c=1 2560w" data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/384/22__73728.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/384/22__73728.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/384/22__73728.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/384/22__73728.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/384/22__73728.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/384/22__73728.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/384/22__73728.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/384/22__73728.1613648130.jpg?c=1 2560w" class="lazyautosizes lazyloaded" sizes="49px">
                            </a>
                        </li></div><div class="owl-item" style="width: 61px;"><li class="productView-thumbnail">
                            <a class="productView-thumbnail-link" href="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/382/23__988392707.jpg?c=1" data-image-gallery-item="" data-image-gallery-new-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/111/382/23__988392707.jpg?c=1" data-image-gallery-new-image-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/382/23__98839.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/382/23__98839.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/382/23__98839.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/382/23__98839.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/382/23__98839.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/382/23__98839.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/382/23__98839.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/382/23__98839.1613648130.jpg?c=1 2560w" data-image-gallery-zoom-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/382/23__988392707.jpg?c=1">
                                <img src="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/700x900/products/111/382/23__988392707.jpg?c=1" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac" data-sizes="auto" srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/382/23__98839.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/382/23__98839.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/382/23__98839.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/382/23__98839.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/382/23__98839.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/382/23__98839.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/382/23__98839.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/382/23__98839.1613648130.jpg?c=1 2560w" data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/382/23__98839.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/382/23__98839.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/382/23__98839.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/382/23__98839.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/382/23__98839.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/382/23__98839.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/382/23__98839.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/382/23__98839.1613648130.jpg?c=1 2560w" class="lazyautosizes lazyloaded" sizes="49px">
                            </a>
                        </li></div><div class="owl-item" style="width: 61px;"><li class="productView-thumbnail">
                            <a class="productView-thumbnail-link" href="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/388/24__327562707.jpg?c=1" data-image-gallery-item="" data-image-gallery-new-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/111/388/24__327562707.jpg?c=1" data-image-gallery-new-image-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/388/24__32756.1613648131.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/388/24__32756.1613648131.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/388/24__32756.1613648131.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/388/24__32756.1613648131.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/388/24__32756.1613648131.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/388/24__32756.1613648131.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/388/24__32756.1613648131.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/388/24__32756.1613648131.jpg?c=1 2560w" data-image-gallery-zoom-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/388/24__327562707.jpg?c=1">
                                <img src="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/700x900/products/111/388/24__327562707.jpg?c=1" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac" data-sizes="auto" srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/388/24__32756.1613648131.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/388/24__32756.1613648131.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/388/24__32756.1613648131.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/388/24__32756.1613648131.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/388/24__32756.1613648131.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/388/24__32756.1613648131.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/388/24__32756.1613648131.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/388/24__32756.1613648131.jpg?c=1 2560w" data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/388/24__32756.1613648131.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/388/24__32756.1613648131.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/388/24__32756.1613648131.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/388/24__32756.1613648131.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/388/24__32756.1613648131.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/388/24__32756.1613648131.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/388/24__32756.1613648131.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/388/24__32756.1613648131.jpg?c=1 2560w" class="lazyautosizes lazyloaded" sizes="49px">
                            </a>
                        </li></div><div class="owl-item" style="width: 61px;"><li class="productView-thumbnail">
                            <a class="productView-thumbnail-link is-active" href="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/385/27__380452707.jpg?c=1" data-image-gallery-item="" data-image-gallery-new-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/111/385/27__380452707.jpg?c=1" data-image-gallery-new-image-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/385/27__38045.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/385/27__38045.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/385/27__38045.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/385/27__38045.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/385/27__38045.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/385/27__38045.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/385/27__38045.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/385/27__38045.1613648130.jpg?c=1 2560w" data-image-gallery-zoom-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/385/27__380452707.jpg?c=1">
                                <img src="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/700x900/products/111/385/27__380452707.jpg?c=1" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac" data-sizes="auto" srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/385/27__38045.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/385/27__38045.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/385/27__38045.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/385/27__38045.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/385/27__38045.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/385/27__38045.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/385/27__38045.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/385/27__38045.1613648130.jpg?c=1 2560w" data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/385/27__38045.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/385/27__38045.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/385/27__38045.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/385/27__38045.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/385/27__38045.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/385/27__38045.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/385/27__38045.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/385/27__38045.1613648130.jpg?c=1 2560w" class="lazyautosizes lazyloaded" sizes="49px">
                            </a>
                        </li></div><div class="owl-item" style="width: 61px;"><li class="productView-thumbnail">
                            <a class="productView-thumbnail-link" href="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/386/25__919332707.jpg?c=1" data-image-gallery-item="" data-image-gallery-new-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/111/386/25__919332707.jpg?c=1" data-image-gallery-new-image-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/386/25__91933.1613648131.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/386/25__91933.1613648131.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/386/25__91933.1613648131.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/386/25__91933.1613648131.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/386/25__91933.1613648131.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/386/25__91933.1613648131.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/386/25__91933.1613648131.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/386/25__91933.1613648131.jpg?c=1 2560w" data-image-gallery-zoom-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/386/25__919332707.jpg?c=1">
                                <img src="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/700x900/products/111/386/25__919332707.jpg?c=1" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac" data-sizes="auto" srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/386/25__91933.1613648131.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/386/25__91933.1613648131.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/386/25__91933.1613648131.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/386/25__91933.1613648131.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/386/25__91933.1613648131.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/386/25__91933.1613648131.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/386/25__91933.1613648131.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/386/25__91933.1613648131.jpg?c=1 2560w" data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/386/25__91933.1613648131.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/386/25__91933.1613648131.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/386/25__91933.1613648131.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/386/25__91933.1613648131.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/386/25__91933.1613648131.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/386/25__91933.1613648131.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/386/25__91933.1613648131.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/386/25__91933.1613648131.jpg?c=1 2560w" class="lazyautosizes lazyloaded" sizes="49px">
                            </a>
                        </li></div><div class="owl-item" style="width: 61px;"><li class="productView-thumbnail">
                            <a class="productView-thumbnail-link" href="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/389/26__676662707.jpg?c=1" data-image-gallery-item="" data-image-gallery-new-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/111/389/26__676662707.jpg?c=1" data-image-gallery-new-image-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/389/26__67666.1613648131.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/389/26__67666.1613648131.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/389/26__67666.1613648131.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/389/26__67666.1613648131.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/389/26__67666.1613648131.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/389/26__67666.1613648131.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/389/26__67666.1613648131.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/389/26__67666.1613648131.jpg?c=1 2560w" data-image-gallery-zoom-image-url="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1000x1100/products/111/389/26__676662707.jpg?c=1">
                                <img src="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/700x900/products/111/389/26__676662707.jpg?c=1" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac" data-sizes="auto" srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/389/26__67666.1613648131.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/389/26__67666.1613648131.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/389/26__67666.1613648131.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/389/26__67666.1613648131.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/389/26__67666.1613648131.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/389/26__67666.1613648131.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/389/26__67666.1613648131.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/389/26__67666.1613648131.jpg?c=1 2560w" data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/389/26__67666.1613648131.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/389/26__67666.1613648131.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/389/26__67666.1613648131.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/389/26__67666.1613648131.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/389/26__67666.1613648131.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/389/26__67666.1613648131.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/389/26__67666.1613648131.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/389/26__67666.1613648131.jpg?c=1 2560w" class="lazyautosizes lazyloaded" sizes="49px">
                            </a>
                        </li></div></div></div>
                        
                        
                        
                        
                        
                        
                        
                    </ul>
                </div>
            </section>
            
            <div class="col-md-7 col-12">
                <div class="row">
                    <div class="col-xl-7 col-xs-12 prorightw">
                        <section class="productView-details product-data">
                            <div class="productView-product">
                                <h1 class="productView-title" itemprop="name">{{ $product->name }}</h1><hr>
                                <h2 class="productView-brand" itemprop="brand" itemscope="" itemtype="http://schema.org/Brand">
                                    <a href="../brands/sagaform/index.html" itemprop="url"><span itemprop="name">{{ $product->name }}</span></a>
                                </h2>
                                <div class="productView-price">
                                    
                                    <div class="price-section d-inline-block price-section--withoutTax rrp-price--withoutTax" style="display: none;">
                                        
                                        <span data-product-rrp-price-without-tax="" class="price price--rrp"> 
                                            
                                        </span>
                                    </div>
                                    
                                    <div class="price-section d-inline-block price-section--withoutTax" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                                        <span class="price-label">
                                            
                                        </span>
                                        <span class="price-now-label" style="display: none;">
                                            
                                        </span>
                                        <span data-product-price-without-tax="" class="price price--withoutTax">${{ $product->price }}</span>
                                        <meta itemprop="availability" itemtype="http://schema.org/ItemAvailability" content="http://schema.org/InStock">
                                        <meta itemprop="itemCondition" itemtype="http://schema.org/OfferItemCondition" content="http://schema.org/NewCondition">
                                        <meta itemprop="priceCurrency" content="INR">
                                        <meta itemprop="url" content="index.html">
                                        <div itemprop="priceSpecification" itemscope="" itemtype="http://schema.org/PriceSpecification">
                                            <meta itemprop="price" content="25">
                                            <meta itemprop="priceCurrency" content="INR">
                                            <meta itemprop="valueAddedTaxIncluded" content="false">
                                        </div>
                                    </div>
                                    <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax" style="display: none;">
                                        
                                        <span data-product-non-sale-price-without-tax="" class="price price--non-sale">
                                            
                                        </span>
                                    </div>
                                    <div class="price-section d-inline-block price-section--saving price" style="display: none;">
                                        <span class="price">(You save</span>
                                        <span data-product-price-saved="" class="price price--saving">
                                            
                                        </span>
                                        <span class="price">)</span>
                                    </div>
                                </div>
                                <div data-content-region="product_below_price"></div><hr>
                                <div class="productView-rating">
                                    <span class="productView-ratingWrapper" title="Product rating is 0 of 5" tabindex="0">
                                        <div class="comments_note wb-list-product-reviews">
                                            <span class="avg-rate bg-re3">
                                                <span class="or-rate winter-review">
                                                    <span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><span class="icon icon--ratingEmpty"><i class="fa fa-star-o"></i></span><!-- snippet location product_rating -->
                                                </span>
                                            </span>
                                        </div>
                                    </span>
                                    <span>(No reviews yet)</span>
                                    <a href="index.html" class="productView-reviewLink productView-reviewLink--new" data-reveal-id="modal-review-form" role="button">
                                        Write a Review
                                    </a>
                                    <div id="modal-review-form" class="modal" data-reveal="">
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="modal-content"><div class="modal-header">
                                            <h2 class="modal-header-title">Write a Review</h2>
                                            <button class="modal-close" type="button" title="Close">
                                                <span class="aria-description--hidden">Close</span>
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div><div class="modal-body">
                                            <div class="writeReview-productDetails">
                                                <div class="writeReview-productImage-container">
                                                    <img src="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/397x500/products/111/383/1__097252707.jpg?c=1" alt="Interdum et malesuada fames ac" title="Interdum et malesuada fames ac" data-sizes="auto" srcset="../../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/383/1__097252707.jpg?c=1" data-srcset="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/80w/products/111/383/1__09725.1613648130.jpg?c=1 80w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/160w/products/111/383/1__09725.1613648130.jpg?c=1 160w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/320w/products/111/383/1__09725.1613648130.jpg?c=1 320w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/640w/products/111/383/1__09725.1613648130.jpg?c=1 640w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/960w/products/111/383/1__09725.1613648130.jpg?c=1 960w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1280w/products/111/383/1__09725.1613648130.jpg?c=1 1280w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1920w/products/111/383/1__09725.1613648130.jpg?c=1 1920w, https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/2560w/products/111/383/1__09725.1613648130.jpg?c=1 2560w" class="lazyload">
                                                </div>
                                                <h6 class="product-brand">Sagaform</h6>
                                                <h5 class="product-title">Interdum et malesuada fames ac</h5>
                                            </div>
                                            <form class="form writeReview-form" action="https://martega.mybigcommerce.com/postreview.php" method="post">
                                                <fieldset class="form-fieldset">
                                                    <div class="form-field form-field--select">
                                                        <label class="form-label" for="rating-rate">Rating
                                                            <small>*</small>
                                                        </label>
                                                        <!-- Stars -->
                                                        <!-- TODO: Review Stars need to be componentised, both for display and input -->
                                                        <select id="rating-rate" class="form-select" name="revrating" data-input="" aria-required="true">
                                                            <option value="">Select Rating</option>
                                                            <option value="1">1 star (worst)</option>
                                                            <option value="2">2 stars</option>
                                                            <option value="3">3 stars (average)</option>
                                                            <option value="4">4 stars</option>
                                                            <option value="5">5 stars (best)</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <!-- Name -->
                                                    <div class="form-field form-field--input form-field--inputText" id="revfromname" data-validation="">
                                                        <label class="form-label" for="revfromname_input">Name
                                                            <small>*</small>
                                                        </label>
                                                        <input type="text" name="revfromname" id="revfromname_input" class="form-input" data-label="Name" data-input="" aria-required="true">
                                                    </div>
                                                    
                                                    <!-- Email -->
                                                    <div class="form-field form-field--input form-field--inputText" id="email" data-validation="">
                                                        <label class="form-label" for="email_input">Email
                                                            <small>*</small>
                                                        </label>
                                                        <input type="text" name="email" id="email_input" class="form-input" data-label="Email" data-input="" aria-required="true">
                                                    </div>
                                                    
                                                    <!-- Review Subject -->
                                                    <div class="form-field form-field--input form-field--inputText" id="revtitle" data-validation="">
                                                        <label class="form-label" for="revtitle_input">Review Subject
                                                            <small>*</small>
                                                        </label>
                                                        <input type="text" name="revtitle" id="revtitle_input" class="form-input" data-label="Review Subject" data-input="" aria-required="true">
                                                    </div>
                                                    
                                                    <!-- Comments -->
                                                    <div class="form-field form-field--textarea" id="revtext" data-validation="">
                                                        <label class="form-label" for="revtext_input">Comments
                                                            <small>*</small>
                                                        </label>
                                                        <textarea name="revtext" id="revtext_input" data-label="Comments" rows="" aria-required="true" data-input="" class="form-input"></textarea>
                                                    </div>
                                                    
                                                    <div class="g-recaptcha" data-sitekey="6LcjX0sbAAAAACp92-MNpx66FT4pbIWh-FTDmkkz"><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-eiu3vo9ivary" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LcjX0sbAAAAACp92-MNpx66FT4pbIWh-FTDmkkz&amp;co=ZmlsZTo.&amp;hl=en&amp;v=xds0rzGrktR88uEZ2JUvdgOY&amp;size=normal&amp;cb=wiw165abum3l"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div><br>
                                                    
                                                    <div class="form-field form-field--submit">
                                                        <input type="submit" class="button button--primary" value="Submit Review">
                                                    </div>
                                                    <input type="hidden" name="product_id" value="111">
                                                    <input type="hidden" name="action" value="post_review">
                                                    
                                                </fieldset>
                                            </form>
                                        </div></div><div class="loadingOverlay" style="display: none;"></div></div>
                                        <hr>
                                    </div>
                                    
                                    <dl class="productView-info">
                                        <dt class="productView-info-name sku-label">SKU:</dt>
                                        <dd class="productView-info-value" data-product-sku="" itemprop="sku">SM13</dd>
                                        <dt class="productView-info-name upc-label" style="display: none;">UPC:</dt>
                                        <dd class="productView-info-value" data-product-upc=""></dd>
                                        
                                        
                                        <div class="prduct-de">
                                            <dt class="productView-info-name">Condition:</dt>
                                            <dd class="productView-info-value">New</dd>
                                        </div>
                                        
                                        <div class="productView-info-bulkPricing">
                                        </div>
                                        
                                    </dl>
                                </div>
                                <form class="form form-wishlist form-action" method="post">
                                    <a aria-controls="wishlist-dropdown" aria-expanded="false" class="button dropdown-menu-button" data-dropdown="wishlist-dropdown" href="#">
                                        <span>Wish List</span>
                                        <i aria-hidden="true" class="icon">
                                            <svg>
                                                <use xlink:href="#icon-chevron-down"></use>
                                            </svg>
                                        </i>
                                    </a>
                                    <ul aria-hidden="true" class="dropdown-menu" data-dropdown-content="" id="wishlist-dropdown" style="position: absolute; left: -99999px; top: 49px;">
                                        <li>
                                            <input type="button" class="button" type="submit" value="Add to My Wish List" onclick="wishlist({{ $product->id }},'add')">
                                        </li>
                                        <li>
                                            <a data-wishlist="" class="button" onclick="wishlist({{ $product->id }},'remove')">Delete From  Wish List</a>
                                        </li>
                                    </ul>
                                   
                                    <div class="addthis_toolbox addthis_32x32_style" addthis:url="" addthis:title="">
                                        <ul class="socialLinks">
                                            <li class="socialLinks-item socialLinks-item--facebook">
                                                <a class="addthis_button_facebook socialLinks__link icon icon--facebook" title="Facebook" href="#">
                                                    <span class="aria-description--hidden">Facebook</span>
                                                    <svg>
                                                        <use xlink:href="#icon-facebook"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="socialLinks-item socialLinks-item--email">
                                                <a class="addthis_button_email socialLinks__link icon icon--email" title="Email" href="#">
                                                    <span class="aria-description--hidden">Email</span>
                                                    <svg>
                                                        <use xlink:href="#icon-envelope"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="socialLinks-item socialLinks-item--print">
                                                <a class="addthis_button_print socialLinks__link icon icon--print" title="Print" href="#">
                                                    <span class="aria-description--hidden">Print</span>
                                                    <svg>
                                                        <use xlink:href="#icon-print"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="socialLinks-item socialLinks-item--twitter">
                                                <a class="addthis_button_twitter socialLinks__link icon icon--twitter" title="Twitter" href="#">
                                                    <span class="aria-description--hidden">Twitter</span>
                                                    <svg>
                                                        <use xlink:href="#icon-twitter"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="socialLinks-item socialLinks-item--pinterest">
                                                <a class="addthis_button_pinterest socialLinks__link icon icon--pinterest" title="Pinterest" href="#">
                                                    <span class="aria-description--hidden">Pinterest</span>
                                                    <svg>
                                                        <use xlink:href="#icon-pinterest"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                        <script type="text/javascript" defer="" src="../../s7.addthis.com/js/300/addthis_widget.html#pubid=ra-4e94ed470ee51e32"></script>
                                        <script>
                                            window.addEventListener('DOMContentLoaded', function() {
                                                if (typeof(addthis) === "object") {
                                                    addthis.toolbox('.addthis_toolbox');
                                                }
                                            });
                                        </script>
                                    </div>
                                </section>
                            </div>
                            
                            <div class="col-xl-5 col-xs-12 prorightwt">
                                <section class="productView-details">
                                    <div class="productView-options">
                                        
                                        <input type="hidden" name="action" value="add">
                                        <input type="hidden" name="product_id" value="111">
                                        <div data-product-option-change="" style="">
                                        </div>
                                        <div class="form-field form-field--stock u-hiddenVisually">
                                            <label class="form-label form-label--alternate">
                                                Current Stock:
                                                <span data-product-stock=""></span>
                                            </label>
                                        </div>
                                        <div class="form-field form-field--increments">
                                            <label class="form-label form-label--alternate" for="qty[]">Quantity:</label>
                                            <div class="form-increment" data-quantity-change="">
                                                <button type="button" class="button button--icon" data-action="dec" onclick="addToCart({{ $product->id }},'decrease')">
                                                    <span class="is-srOnly">Decrease Quantity:</span>
                                                    <i class="icon" aria-hidden="true">
                                                        <svg>
                                                            <use xlink:href="#icon-keyboard-arrow-down"></use>
                                                        </svg>
                                                    </i>
                                                </button>
                                                <input class="form-input form-input--incrementTotal" id="qty[]" name="qty[]" type="tel" value="1" data-quantity-min="0" data-quantity-max="0" min="1" pattern="[0-9]*" aria-live="polite">
                                                <button type="button" class="button button--icon" data-action="inc" onclick="addToCart({{ $product->id }},'increase')">
                                                    <span class="is-srOnly">Increase Quantity:</span>
                                                    <i class="icon" aria-hidden="true">
                                                        <svg>
                                                            <use xlink:href="#icon-keyboard-arrow-up"></use>
                                                        </svg>
                                                    </i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="alertBox productAttributes-message" style="display:none">
                                            <div class="alertBox-column alertBox-icon">
                                                <icon glyph="ic-success" class="icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg></icon>
                                            </div>
                                            <p class="alertBox-column alertBox-message"></p>
                                        </div>
                                        <div class="form-action">
                                            <input id="form-action-addToCart" data-wait-message="Adding to cart…" class="button button--primary" type="button" value="Add to Cart" onclick="addToCart({{ $product->id }},'increase')">
                                        </div>
                                        
                                    </div>
                                    
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <article class="productView-description" itemprop="description">
                    <ul class="tabs" data-tab="">
                        <li class="tab is-active">
                            <a class="tab-title" href="#tab-description">Description</a>
                        </li>
                    </ul>
                    <div class="tabs-contents">
                        <div class="tab-content is-active" id="tab-description">
                            <p><span class="co-pro">[shortcode][countdown]08/10/2023[/countdown][/shortcode]</span><!-- pagebreak -->{!! $product->description !!}</p>
                        </div>
                        <div class="tab-content" id="tab-reviews">
                        </div>
                    </div>
                </article>
            </div>
            
            <div id="previewModal" class="modal modal--large" data-reveal="">
                <button class="modal-close" type="button" title="Close">
                    <span class="aria-description--hidden">Close</span>
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-content"></div>
                <div class="loadingOverlay" style="display: none;"></div>
            </div>
            
            
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#addi-img").owlCarousel({
                        itemsCustom : [
                        [0, 1],
                        [320, 2],
                        [575, 3],
                        [801, 5]
                        ],
                        autoPlay: 7000,
                        navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                        navigation : false,
                        pagination: false
                    });
                });
            </script>
            
            <div data-content-region="product_below_content"></div>
            
            
            
            
            
            <div class="home-heading  page-heading text-left"><h1><strong>Related</strong> Products</h1></div>
            
            <div class="has-jsContent pro-margin next-prevb row" id="tab-related">
                <section class="productCarousel slick-initialized slick-slider" data-list-name="" data-slick="{
        &quot;dots&quot;: false,
        &quot;infinite&quot;: false,
        &quot;row&quot;: 2,
        &quot;mobileFirst&quot;: true,
        &quot;slidesToShow&quot;: 2,
        &quot;slidesToScroll&quot;: 1,
        &quot;slide&quot;: &quot;.js-product-slide&quot;,
        &quot;prevArrow&quot;: &quot;.js-related-product-arrow.js-product-prev-arrow&quot;,
        &quot;nextArrow&quot;: &quot;.js-related-product-arrow.js-product-next-arrow&quot;,
        &quot;responsive&quot;: [
            {
                &quot;breakpoint&quot;: 1409,
                &quot;settings&quot;: {
                    &quot;slidesToScroll&quot;: 1,
                    &quot;slidesToShow&quot;: 5
                }
            },
            {
                &quot;breakpoint&quot;: 1199,
                &quot;settings&quot;: {
                    &quot;slidesToScroll&quot;: 1,
                    &quot;slidesToShow&quot;: 4
                }
            },
            {
                &quot;breakpoint&quot;: 991,
                &quot;settings&quot;: {
                    &quot;slidesToScroll&quot;: 1,
                    &quot;slidesToShow&quot;: 3
                }
            },
            {
                &quot;breakpoint&quot;: 767,
                &quot;settings&quot;: {
                    &quot;slidesToScroll&quot;: 1,
                    &quot;slidesToShow&quot;: 3
                }
            },
            {
                &quot;breakpoint&quot;: 599,
                &quot;settings&quot;: {
                    &quot;slidesToScroll&quot;: 1,
                    &quot;slidesToShow&quot;: 3
                }
            },
            {
                &quot;breakpoint&quot;: 411,
                &quot;settings&quot;: {
                    &quot;slidesToScroll&quot;: 1,
                    &quot;slidesToShow&quot;: 2
                }
            }
        ]
    }">
                
                
                
                <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 220px; transform: translate3d(0px, 0px, 0px);"><div class="productCarousel-slide js-product-slide col-12 slick-slide slick-current slick-active" style="width: 220px;" data-slick-index="0" aria-hidden="false" tabindex="0">
                    @if($related_products)
                    @foreach($related_products as $pro)
                    <article class="card ">
                        <figure class="card-figure text-left">
                            <a href="{{ route('product.detail',$pro->id) }}">
                                <div class="card-img-container">
                                    <img src="{{ asset('admin/dist/img/product/' . $pro->image) }}" alt="{{ $pro->name }}" title="{{ $pro->name }}" data-sizes="auto" srcset="{{ asset('admin/dist/img/product/' . $pro->image) }}" data-srcset="{{ asset('admin/dist/img/product/' . $pro->image) }}" sizes="190px">
                                </div>
                                <img src="{{ asset('admin/dist/img/product/' . $pro->image) }}" alt="{{ $pro->name }}" title="{{ $pro->name }}" class="second-img">
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
                                <a href="../canvas-laundry-cart/index.html">{{ $pro->name }}</a>
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
                                    <span class="price-label" style="display: none;">
                                        
                                    </span>
                                    <span class="price-now-label">
                                        
                                    </span>
                                    <span data-product-price-without-tax="" class="price price--withoutTax">$ {{ $product->price }}</span>
                                </div>
                                <!-- <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax">
                                    
                                    <span data-product-non-sale-price-without-tax="" class="price price--non-sale">
                                        
                                    </span>
                                </div> -->
                            </div>
                            
                            <figcaption class="card-figcaption">
                                <div class="card-figcaption-body">
                                    <div class="top-btn">
                                        <a href="../cart.html?action=add&amp;product_id=103" title="Add to Cart" data-event-type="product-click" class="cartb button button--small card-figcaption-button"><svg width="20px" height="20px"><use xlink:href="#pcart"></use></svg></a>
                                        <!-- <div class="bwish">
                                            <form action="/wishlist.php?action&#x3D;add&amp;product_id&#x3D;103" class="form-wishlist form-action card-figcaption-button" data-wishlist-add method="post">     
                                                <button type="submit" value="Add to My Wish List" title="Add to My Wish List">
                                                    <svg width="18px" height="18px"> <use xlink:href="#bwish"></use></svg>
                                                </button>
                                            </form>
                                        </div> -->
                                        
                                        <button class="button button--small card-figcaption-button quickview" data-product-id="103"><!-- Quick view --><svg width="19px" height="19px"><use xlink:href="#quick"></use></svg></button>
                                        <label class="button button--small card-figcaption-button bcom" for="compare-103" title="Compare">
                                            <svg width="18px" height="18px"> <use xlink:href="#bcom"></use></svg><input class="wb-compare" type="checkbox" name="products[]" value="103" id="compare-103" data-compare-id="103">
                                        </label>
                                    </div>
                                </div>
                            </figcaption>
                        </div>
                        @endforeach
                        @endif
                    </article>
                </div></div></div></section>
                <!-- <div class="all-btn">
                </div> -->
            </div>
            
            
        </div>
        @push('scripts')
        <script type="text/javascript">    
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
            window.wishlist = function(productId, operation) {
                $.ajax({
                    url: "{{ route('wishlist') }}",
                    method: 'POST',
                    data: {
                        product_id: productId,
                        _token: '{{ csrf_token() }}',
                        operation: operation
                    },
                    success: function(response) {
                        // Show server's response message
                        alert(response.message);
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            alert(xhr.responseJSON.message);
                        } else {
                            alert('An error occurred while processing the wishlist action.');
                        }
                    }
                });
            };

    </script>
    @endpush
    @endsection