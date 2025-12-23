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
                <li class="breadcrumb " itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a class="breadcrumb-label" itemprop="item" href="{{ route('blogs') }}">
                        <span itemprop="name">Blog</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
                <li class="breadcrumb is-active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a class="breadcrumb-label" itemprop="item" href="{{ route('blogdetail',['blog'=>$blog->id])}}" aria-current="page">
                        <span itemprop="name">{{ $blog->heading }}</span>
                    </a>
                    <meta itemprop="position" content="3">
                </li>
    </ol>
</nav>
<div class="single-blog">
<article class="blog allblog">
    <div class="blog-post-figure">
            <figure class="blog-thumbnail">
                <a href="{{ route('blogdetail',['blog'=>$blog->id])}}">
                    <img class="lazyautosizes ls-is-cached lazyloaded" data-sizes="auto" src="{{ asset('admin/dist/img/'.$blog->image) }}" data-src="{{ asset('admin/dist/img/'.$blog->image) }}" alt="Integer varius suscipit dapibus" title="Integer varius suscipit dapibus" sizes="848px">
                </a>
            </figure>
    </div>

    <div class="blog-post-body">
        <header class="blog-header">
            <h2 class="blog-title">
                <a href="{{ route('blogdetail',['blog'=>$blog->id])}}">{{ $blog->heading }}</a>
            </h2>
            <p class="blog-date">Posted by Martega on 17th Feb 2021</p>
        </header>

        <div class="blog-post">
                <p>{{ $blog->description }}</p>
        </div>


                {{-- <ul class="tags">
                    <li class="tag">
                        <a href="../tag/Blog.html">Blog</a>
                    </li>
                    <li class="tag">
                        <a href="../tag/Demo.html">Demo</a>
                    </li>
                    <li class="tag">
                        <a href="../tag/Webi.html">Webi</a>
                    </li>
                    <li class="tag">
                        <a href="../tag/Winter.html">Winter</a>
                    </li>
                </ul> --}}
    </div> 
    </article>
</div>
@endsection