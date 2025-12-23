@extends('layouts.app')
@section('content')
<?php
    use App\Models\Brand;
    $brands = Brand::all();
?>
<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumb" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="../index.html">
                <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1">
        </li>
        <li class="breadcrumb is-active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="index.html" aria-current="page">
                <span itemprop="name">Contact Us</span>
            </a>
            <meta itemprop="position" content="2">
        </li>
    </ol>
</nav>
<main class="page">
    <div class="home-heading ot"><h1 class="page-heading"><strong>Contact</strong> Us</h1></div>

    <div id="contact-us-page">
        <p>We're happy to answer questions or help you with returns.<br>Please fill out the form below if you need assistance.</p>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>  
        @endif
        <form action="{{ route('storecontactus') }}" id="contact_form" method="post">
            @csrf

            

            <div class="form-row form-row--half">
                <div class="form-field">
                    <label class="form-label" for="fullname">Full Name</label>
                    <input class="form-input" type="text" id="fullname" name="fullname" value="{{ old('fullname') }}">
                    @error('fullname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-field">
                    <label class="form-label" for="phone_number">Phone Number</label>
                    <input class="form-input" type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-field">
                    <label class="form-label" for="email">Email Address <small>*</small></label>
                    <input class="form-input" type="email" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-field">
                    <label class="form-label" for="order_number">Order Number</label>
                    <input class="form-input" type="text" id="order_number" name="order_number" value="{{ old('order_number') }}">
                    @error('order_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-field">
                    <label class="form-label" for="company_name">Company Name</label>
                    <input class="form-input" type="text" id="company_name" name="company_name" value="{{ old('company_name') }}">
                    @error('company_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-field">
                    <label class="form-label" for="rma_number">RMA Number</label>
                    <input class="form-input" type="text" id="rma_number" name="rma_number" value="{{ old('rma_number') }}">
                    @error('rma_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-field">
                <label class="form-label" for="contact_question">Comments/Questions <small>*</small></label>
                <textarea name="comments" id="contact_question" rows="5" cols="50" class="form-input">{{ old('comments') }}</textarea>
                @error('comments')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-actions">
                <input class="button button--primary" type="submit" value="Submit Form">
            </div>
        </form>
    </div>
</main>
@endsection
