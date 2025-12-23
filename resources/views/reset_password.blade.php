@extends('layouts.app')

@section('content')
<div class="account account--fixedSmall">

    <nav aria-label="Breadcrumb" class="breadcrumbs-bg">
        <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li class="breadcrumb" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a class="breadcrumb-label" itemprop="item" href="{{ route('indexxxx') }}">
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li class="breadcrumb is-active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span class="breadcrumb-label" itemprop="item" aria-current="page">
                    <span itemprop="name">Forgot Password</span>
                </span>
                <meta itemprop="position" content="2">
            </li>
        </ol>
    </nav>

    <div class="home-heading ot">
        <h1 class="page-heading"><strong>Reset</strong> Password</h1>
    </div>
    
    <p>Fill in your email below to request a new password. An email will be sent to the address below containing a link to reset your password.</p>

    <form action="#" class="form forgot-password-form" method="POST">
        @csrf <!-- CSRF token for security -->
        
        <label class="form-label" for="email">Email Address</label>
        <div class="form-prefixPostfix wrap">
            <input class="form-input" name="email" id="email" type="email" required>
            <input type="submit" class="button button--primary form-prefixPostfix-button--postfix" value="Reset Password">
        </div>
    </form>
</div>
@endsection
