@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-3">
 <div class="col-md-8">
  <div class="card">
   <div class="card-header">
    <div class="float-start">Add New Product</div>
    <div class="float-end">
     <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
    </div>
   </div>

   <div class="card-body">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
     @csrf

     <div class="mb-3 row">
      <label for="code" class="col-md-4 col-form-label text-md-end text-start">Code</label>
      <div class="col-md-6">
       <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
       @error('code') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
     </div>

     <div class="mb-3 row">
      <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
      <div class="col-md-6">
       <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
       @error('name') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
     </div>

     <div class="mb-3 row">
      <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
      <div class="col-md-6">
       <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">
       @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
     </div>

     <div class="mb-3 row">
      <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
      <div class="col-md-6">
       <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
       @error('price') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
     </div>

     <div class="mb-3 row">
      <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
      <div class="col-md-6">
       <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
       @error('description') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
     </div>

     <!-- Upload Photo button & Add Product button side by side -->
     <div class="mb-3 row">
      <label class="col-md-4 col-form-label text-md-end text-start">Photo</label>
      <div class="col-md-6 d-flex gap-2 align-items-center">
       <input type="file" id="photoInput" name="photo" accept="image/*" style="display: none;" onchange="previewImage(event)">

       <button type="button" class="btn btn-secondary" onclick="document.getElementById('photoInput').click();">
         Upload Photo
       </button>

       <input type="submit" class="btn btn-primary" value="Add Product">
      </div>
     </div>

     <!-- Image preview -->
     <div class="mb-3 row">
      <label class="col-md-4 col-form-label text-md-end text-start">Preview</label>
      <div class="col-md-6">
       <img id="preview" style="max-height: 200px; display: none;" />
      </div>
     </div>

    </form>
   </div>
  </div>
 </div>
</div>

<script>
function previewImage(event) {
 const reader = new FileReader();
 reader.onload = function () {
   const preview = document.getElementById('preview');
   preview.src = reader.result;
   preview.style.display = 'block';
 };
 reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
