@extends('layouts.app')
@section('content')
<div class="login">
                       
<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumb " itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="{{ route('indexxxx') }}">
                <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1">
        </li>
        <li class="breadcrumb is-active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="{{ route('userlogin') }}" aria-current="page">
                <span itemprop="name">Login</span>
            </a>
            <meta itemprop="position" content="2">
        </li>
    </ol>
</nav>
                    <div class="home-heading ot">
                    @if(Session::has('msg'))
                        <div class="alert alert-success">{{ Session::get('msg') }}</div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    <h1 class="page-heading"><strong>Sign</strong> in</h1></div>
                    <div class="login-row">
                        <form class="login-form form" action="{{ route('usersignin') }}" method="post">                            
                            @csrf
                            <div class="form-field form-field--input form-field--inputEmail">
                                <label class="form-label font-weight-bold" for="email">Email Address:</label>
                                <input class="form-input" name="email" id="email" type="email">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            <span style="display: none;"></span></div>
                            <div class="form-field form-field--input form-field--inputPassword">
                                <label class="form-label font-weight-bold" for="password">Password:</label>
                                <input class="form-input" id="password" type="password" name="password" autocomplete="off">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            <span style="display: none;"></span></div>
                            <div class="form-actions">
                                <input type="submit" class="button button--primary" value="Sign in">
                                <a class="forgot-password" href="{{ route('resetpassword') }}">Forgot your password?</a>
                            </div>
                        </form>
                            <div class="new-customer">
                                <div class="panel">
                                    <div class="panel-header">
                                        <h2 class="panel-title">New Customer?</h2>
                                    </div>
                                    <div class="panel-body">
                                        <p class="new-customer-intro">Create an account with us and you'll be able to:</p>
                                        <ul class="new-customer-fact-list">
                                            <li class="new-customer-fact">Check out faster</li>
                                            <li class="new-customer-fact">Save multiple shipping addresses</li>
                                            <li class="new-customer-fact">Access your order history</li>
                                            <li class="new-customer-fact">Track new orders</li>
                                            <li class="new-customer-fact">Save items to your Wish List</li>
                                        </ul>
                                        <a href="{{ route('userregister') }}"><button class="button button--primary">Create Account</button></a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

@endsection

