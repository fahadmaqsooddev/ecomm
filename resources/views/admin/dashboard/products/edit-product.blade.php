@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Product</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Product</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('admin.updateproduct', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
              <div class="form-group">
                <label for="categoryname">Category Name</label>
                <select name="category_id" class="form-control">
                    <option value="" selected disabled>Choose One Option</option>
                    @if($categories)
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if(old('category_id', $product->category_id) == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('category_id')
                <span class="text-danger mt-5">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="brandname">Brand Name</label>
                <select name="brand_id" class="form-control">
                  <option value="" selected disabled>Choose One Option</option>
                  @if($brands)
                  @foreach($brands as $brand)
                  <option value="{{ $brand->id }}" @if(old('brand_id', $product->brand_id) == $brand->id) selected @endif> {{ $brand->name }} </option>
                  @endforeach
                  @endif
                </select>
                @error('brand_id')
                <span class="text-danger mt-5">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" id="categoryname" placeholder="Enter Product Name" value="{{ old('name', $product->name) }}">
                @error('name')
                <span class="text-danger mt-5">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Enter Price" value="{{ old('price', $product->price) }}">
                @error('price')
                <span class="text-danger mt-5">{{ $message }}</span>
                @enderror
              </div>


              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity" value="{{ old('quantity', $product->quantity) }}">
                @error('quantity')
                <span class="text-danger mt-5">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('image')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="summernote" name="description" rows="8" cols="10">{{ old('description', $product->description) }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <!--/.col (left) -->
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<script>
  $(function () {
    // Initialize Summernote with custom height
    $('#summernote').summernote({
      height: 300 // Set the desired height in pixels
    });
  });
</script>
@endsection
