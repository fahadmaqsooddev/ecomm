@extends('admin.layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row mt-3">
           <div class="col-md-6">
                <div class="card main_card" style="box-shadow: 0px 0px 20px 0px lightgray;border: none;">
                    <div class="card-body text-center">
                        <h3><a href="{{ route('admin.categories') }}">Categories</a></h3>
                        <h3>{{ $data[0] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card main_card" style="box-shadow: 0px 0px 20px 0px lightgray;border: none;">
                    <div class="card-body text-center">
                        <h3><a href="{{ route('admin.products') }}">Products</a></h3>
                        <h3>{{ $data[1] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card main_card" style="box-shadow: 0px 0px 20px 0px lightgray;border: none;">
                    <div class="card-body text-center">
                        <h3><a href="{{ route('admin.brand') }}">Brands</a></h3>
                        <h3>{{ $data[2] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
