@extends('layouts.app')
@section('content')
<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumb" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="index.html">
                <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1">
        </li>
        <li class="breadcrumb is-active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label" itemprop="item" href="{{ route('userregister') }}" aria-current="page">
                <span itemprop="name">Create Account</span>
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
    <h1 class="page-heading"><strong>New</strong> Account</h1>
</div>
<div class="account account--fixed">
    <div class="account-body">
        <form action="{{ route('registration') }}" method="post">
            @csrf

            <div class="form-row form-row--half">
                <div class="form-field form-field--input form-field--inputText" id="FormField_name">
                    <label class="form-label font-weight-bold" for="name">Name<small> *</small></label>
                    <input type="text" name="name" id="name" class="form-input" data-label="Name" aria-required="true" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-field form-field--input form-field--inputText" id="FormField_email">
                    <label class="form-label font-weight-bold" for="email">Email Address<small> *</small></label>
                    <input type="email" name="email" id="email" class="form-input" data-label="Email Address" aria-required="true" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-field form-field--input form-field--inputPassword" id="FormField_password">
                    <label class="form-label font-weight-bold" for="password">Password<small>  * </small></label>
                    <input type="password" class="form-input" id="password" name="password" value="" autocomplete="off" aria-required="true">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-field form-field--input form-field--inputPassword" id="FormField_confirm_password">
                    <label class="form-label font-weight-bold" for="confirm_password">Confirm Password<small>  * </small></label>
                    <input type="password" class="form-input" id="confirm_password" name="password_confirmation" value="" autocomplete="off" aria-required="true">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>


                <div class="form-field form-field--input form-field--inputText" id="FormField_phone_number">
                    <label class="form-label font-weight-bold" for="phone_number">Phone Number<small>  * </small></label>
                    <input type="text" name="phone_number" id="phone_number" class="form-input" data-label="Phone Number" aria-required="false" value="{{ old('phone_number') }}">
                    @if ($errors->has('phone_number'))
                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                    @endif
                </div>

                <div class="form-field form-field--input form-field--inputText" id="FormField_address_line_1">
                    <label class="form-label font-weight-bold" for="address_line_1">Address Line 1<small>  * </small></label>
                    <input type="text" name="address_line_1" id="address_line_1" class="form-input" data-label="Address Line 1" aria-required="true" value="{{ old('address_line_1') }}">
                    @if ($errors->has('address_line_1'))
                        <span class="text-danger">{{ $errors->first('address_line_1') }}</span>
                    @endif
                </div>

                <div class="form-field form-field--input form-field--inputText" id="FormField_address_line_2">
                    <label class="form-label font-weight-bold" for="address_line_2">Address Line 2<small>  * </small></label>
                    <input type="text" name="address_line_2" id="address_line_2" class="form-input" data-label="Address Line 2" aria-required="false" value="{{ old('address_line_2') }}">
                    @if ($errors->has('address_line_2'))
                        <span class="text-danger">{{ $errors->first('address_line_2') }}</span>
                    @endif
                </div>

                <div class="form-field form-field--input form-field--inputText" id="FormField_city">
                    <label class="form-label font-weight-bold" for="city">Suburb/City<small>  * </small></label>
                    <input type="text" name="city" id="city" class="form-input" data-label="Suburb/City" aria-required="true" value="{{ old('city') }}">
                    @if ($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif
                </div>

                <div class="form-field form-field--select" id="FormField_country">
                    <label class="form-label font-weight-bold" for="country">Country<small>  * </small></label>
                    <select class="form-select" name="country" id="country" data-label="Country" aria-required="true">
                        @if($countries)
                            @foreach($countries as $value => $name)
                                <option value="{{ $value }}" {{ old('country') == $value ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('country'))
                        <span class="text-danger">{{ $errors->first('country') }}</span>
                    @endif
                </div>

                <div class="form-field form-field--input form-field--inputText" id="FormField_state">
                    <label class="form-label font-weight-bold" for="state">State/Province<small>  * </small></label>
                    <input type="text" name="state" id="state" class="form-input" data-label="State/Province" aria-required="true" value="{{ old('state') }}">
                    @if ($errors->has('state'))
                        <span class="text-danger">{{ $errors->first('state') }}</span>
                    @endif
                </div>

                <div class="form-field form-field--input form-field--inputText" id="FormField_zip_code">
                    <label class="form-label font-weight-bold" for="zip_code">Zip/Postcode<small>  * </small></label>
                    <input type="text" name="zip_code" id="zip_code" class="form-input" data-label="Zip/Postcode" aria-required="true" value="{{ old('zip_code') }}">
                    @if ($errors->has('zip_code'))
                        <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" class="button button--primary" value="Create Account">
            </div>
        </form>
    </div>
</div>
@endsection
