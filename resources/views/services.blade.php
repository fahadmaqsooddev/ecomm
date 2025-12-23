@extends('layouts.app')
@section('content')
<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li class="breadcrumb " itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a class="breadcrumb-label" itemprop="item" href="{{ route('indexxxx') }}">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumb is-active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a class="breadcrumb-label" itemprop="item" href="brands.html" aria-current="page">
                        <span itemprop="name">Shipping & Returns</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
    </ol>
</nav>
<main class="page">
    <div class="home-heading ot">
        <h1 class="page-heading"><strong>Shipping</strong> &amp; Returns</h1>
    </div>
    <div data-content-region="page_builder_content"></div>
    <div>
        @foreach ($services as $service)
            <p>
                <strong>{{ $service['heading'] }}</strong>
                <br>
                {!! $service['description'] !!}
            </p>
        @endforeach
    </div>
</main>

@endsection

