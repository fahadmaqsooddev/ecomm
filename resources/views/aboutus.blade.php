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
                    <a class="breadcrumb-label" itemprop="item" href="{{ route('about') }}" aria-current="page">
                        <span itemprop="name">About us</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
    </ol>
</nav>
<main class="page">
                    <div class="home-heading ot"><h1 class="page-heading"><strong>About</strong> us</h1></div>


                <div data-content-region="page_builder_content"></div>

                <div>
                        <p>{!! $data->heading !!}</p>
                </div>

            </main>

@endsection

