@extends('layouts.app')
@section('content')
<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li class="breadcrumb " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a class="breadcrumb-label"
                       itemprop="item"
                       href="{{ route('blogs') }}"
                       
                    >
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>
                <li class="breadcrumb is-active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a class="breadcrumb-label"
                       itemprop="item"
                       href="{{ route('blogs') }}"
                       aria-current="page"
                    >
                        <span itemprop="name">Blog</span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>
    </ol>
</nav>
<main class="page">
                    <div class="home-heading ot"><h1 class="page-heading">Blog</h1></div>
                <div class="row">
                    @if($blogs)
                        @foreach($blogs as $blog)

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <article class="blog allblog">
                                        <div class="blog-post-figure">
                                    <figure class="blog-thumbnail">
                                        <a href="{{ route('blogdetail',['blog' => $blog->id]) }}">
                                            <img class="lazyload" data-sizes="auto" src="{{ asset('admin/dist/img/'.$blog->image)}}"  alt="{{ $blog->heading }}" title="{{ $blog->heading }}">
                                        </a>
                                    </figure>
                            </div>

                            <div class="blog-post-body">
                                <header class="blog-header">
                                    <h2 class="blog-title">
                                        <a href="{{ route('blogdetail',['blog' => $blog->id]) }}">{{ $blog->heading }}</a>
                                    </h2>
                                    <p class="blog-date">Posted by Martega on 17th Feb 2021</p>
                                </header>

                                <div class="blog-post">
                                        <div class="allb-post">{{ $blog->description }}<span>&hellip;</span></div>
                                            <div class="bread"><a href="{{ route('blogdetail',['blog' => $blog->id]) }}" class="button button--primary">read more</a></div>
                                </div>



                            

                            </div>
                            
                        </article>
                    </div>
                        @endforeach
                    @endif
                    
                    <!--<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <article class="blog allblog">
            <div class="blog-post-figure">
                    <figure class="blog-thumbnail">
                        <a href="aenean-luctus-magna-mi/index.html">
                            <img class="lazyload" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-3h97v0q79m/stencil/f0538030-fec3-013a-08a5-46249ff3dc17/e/dcd9c960-7994-0139-1126-4680591ce24d/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1075x814/uploaded_images/1.jpg?t=1613651652" alt="Aenean luctus magna mi" title="Aenean luctus magna mi">
                        </a>
                    </figure>
            </div>

            <div class="blog-post-body">
                <header class="blog-header">
                    <h2 class="blog-title">
                        <a href="aenean-luctus-magna-mi/index.html">Aenean luctus magna mi</a>
                    </h2>
                    <p class="blog-date">Posted by Martega on 17th Feb 2021</p>
                </header>

                <div class="blog-post">
                        <div class="allb-post">Aenean luctus magna mi, sed pellentesque odio finibus quis. Proin 
iaculis metus id dui scelerisque maximus. Aliquam orci risus, luctus in 
urna eget, tempus elementum lacus. Fusce euismod, mi nec p<span>&hellip;</span></div>
                            <div class="bread"><a href="aenean-luctus-magna-mi/index.html" class="button button--primary">read more</a></div>
                </div>



               

            </div>
            
        </article>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <article class="blog allblog">
            <div class="blog-post-figure">
                    <figure class="blog-thumbnail">
                        <a href="ut-ut-velit-in-sem-dapibus-aliquam/index.html">
                            <img class="lazyload" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-3h97v0q79m/stencil/f0538030-fec3-013a-08a5-46249ff3dc17/e/dcd9c960-7994-0139-1126-4680591ce24d/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/1075x814/uploaded_images/2.jpg?t=1613651667" alt="Ut ut velit in sem dapibus aliquam" title="Ut ut velit in sem dapibus aliquam">
                        </a>
                    </figure>
            </div>

            <div class="blog-post-body">
                <header class="blog-header">
                    <h2 class="blog-title">
                        <a href="ut-ut-velit-in-sem-dapibus-aliquam/index.html">Ut ut velit in sem dapibus aliquam</a>
                    </h2>
                    <p class="blog-date">Posted by Martega on 17th Feb 2021</p>
                </header>

                <div class="blog-post">
                        <div class="allb-post">Ut ut velit in sem dapibus aliquam eu et purus. Nunc id fermentum erat. 
Pellentesque auctor nulla quis pulvinar aliquet. Proin in congue massa. 
Fusce nec cursus ipsum. Ut fermentum, lacus lacinia<span>&hellip;</span></div>
                            <div class="bread"><a href="ut-ut-velit-in-sem-dapibus-aliquam/index.html" class="button button--primary">read more</a></div>
                </div>



               

            </div>
            
        </article>
                    </div>-->
        </article>
                    </div>
                </div>
                <nav class="pagination" aria-label="pagination">
    <ul class="pagination-list">

    </ul>
</nav>
            </main>
@endsection

