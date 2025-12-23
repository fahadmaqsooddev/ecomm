@extends('layouts.app')
@section('content')
<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li class="breadcrumb " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a class="breadcrumb-label"
                       itemprop="item"
                       href="{{ route('indexxxx')}}"
                       
                    >
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>
                <li class="breadcrumb is-active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a class="breadcrumb-label"
                       itemprop="item"
                       href="{{ route('brands')}}"
                       aria-current="page"
                    >
                        <span itemprop="name">All Brands</span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>
    </ol>
</nav>
<main class="page">
                <div class="home-heading ot"><h1 class="page-heading">Brands</h1></div>
                <div data-content-region="brands_below_header"></div>
                <ul class="brandGrid row">
                    @if($brands)
                        @foreach($brands as $brand)
                        <li class="brand col-lg-2 col-md-3 col-sm-4 col-6">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <a href="#">
                                            <div class="card-img-container">
                                                <img src="{{ asset('admin/dist/img/'.$brand->image)}}" alt="{{ $brand->heading }}" title="{{ $brand->heading }}" 
                                                class="lazyload card-image"/>
                                            </div>
                                        </a>
                                    </figure>
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            <a href="#">{{ $brand->name }}</a>
                                        </h3>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <nav class="pagination" aria-label="pagination">
    <ul class="pagination-list">

    </ul>
</nav>
                <div data-content-region="brands_below_content"></div>
            </main>
@endsection

