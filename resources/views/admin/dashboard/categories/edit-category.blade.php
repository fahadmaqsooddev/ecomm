@extends('admin.layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Category</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Category</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
          </div>

          <form action="{{ route('admin.updatecategory', $category->id) }}" method="POST" enctype="multipart/form-data"> 
            @csrf

            <div class="card-body">
              <div class="row">
                <!-- Category Name -->
                <div class="form-group col-md-6">
                  <label for="categoryname">Category Name</label>
                  <input type="hidden" name="id" value="{{ $category->id }}">
                  <input type="text" name="categoryname" class="form-control" id="categoryname" placeholder="Enter Category Name" value="{{ old('categoryname', $category->name) }}">
                  @error('categoryname')
                    <span class="text-danger mt-1">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Brand -->
                <div class="form-group col-md-6">
                  <label for="brand_id">Brand</label>
                  <select name="brand_id" class="form-control">
                    <option value="">-- Select Brand --</option>
                    @foreach($brands as $brand)
                      <option value="{{ $brand->id }}" {{ old('brand_id', $category->brand_id) == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                      </option>
                    @endforeach
                  </select>
                  @error('brand_id')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <!-- Image Upload (full width) -->
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
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
