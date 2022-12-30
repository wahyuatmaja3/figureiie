@extends('admin.layout.main')

@section('content')
<div class="card w-4/6 mx-auto mt-3 bg-white shadow-xl">
    <div class="card-body">
      <h2 class="card-title">Edit Figure</h2>
      <form action="{{ url('admin/products') }}" method="POST" class="w-full" enctype="multipart/form-data">
        @csrf
        <div class="form-control mb-2 w-full ">
          
            <label class="label">
              <span class="label-text">Name Figure</span>
              <span class="label-text">
                @error('name')
                  <p class="text-red-600">{{ $message }}</p>
                @enderror
              </span>
            </label>
            <input type="text" placeholder="Your figure name" name="name" class="input input-bordered w-full "  onchange="previewImage()" value="{{ old('name', $figure->name) }}" />
          </div>
        <div class="form-control mb-2 w-full ">
            <label class="label">
              <span class="label-text">Price</span>
              <span class="label-text">
                @error('price')
                  <p class="text-red-600">{{ $message }}</p>
                @enderror
              </span>
            </label>
            <input type="text" placeholder="100.000" name="price" class="input input-bordered w-full "  onchange="previewImage()" value="{{ old('price', $figure->price) }}"/>
        </div>
        <div class="form-control mb-2 w-full">
            <label class="label">
                <span class="label-text">Brand</span>
                <span class="label-text">
                  @error('brand')
                    <p class="text-red-600">{{ $message }}</p>
                  @enderror
                </span>
            </label>
            <select class="select select-bordered" name="brand">
                <option disabled selected>Pick one</option>
                @foreach ($brands as $brand)
                    <option value={{ $brand->id }} {{ (old('brand', $figure->brand) == $brand->id) ? "selected" : "" }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control mb-2 w-full ">
            <label class="label">
                <span class="label-text">Franchise</span>
                <span class="label-text">
                  @error('franchise')
                    <p class="text-red-600">{{ $message }}</p>
                  @enderror
                </span>
            </label>
            <select class="select select-bordered" name="franchise">
                <option disabled selected>Pick one</option>
                @foreach ($franchises as $franchise)
                  <option value={{ $franchise->id }} {{ (old('franchise', $figure->franchise) == $franchise->id) ? "selected" : "" }}>{{ $franchise->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-control w-full ">
            <label class="label">
              <span class="label-text">Pick an image</span>
              <span class="label-text">
                @error('image')
                  <p class="text-red-600">{{ $message }}</p>
                @enderror
              </span>
            </label>
              <img class="img-preview w-full">
            <input type="hidden" value="{{ $figure->img }}" name="oldImg">
            @if ($figure->img)
            <img src="{{ asset('storage/' . $figure->img) }}" class="img-preview img-fluid mb-4 col-sm-5">
            @else
            <img class="img-preview img-fluid mb-4 col-sm-5">
            @endif
            <input type="file" class="file-input file-input-bordered w-full h-" id="image" name="image"  
            onchange="previewImage()" />

          </div>

        <button type="submit" class="btn btn-primary w-full mt-6">Add Figure</button>

    </form>
    </div>
  </div>

  <script>
    function previewImage() {
      const image = document.querySelector('#image');
      const imagePreview = document.querySelector('.img-preview');

      // imagePreview.style.display = 'block';

      // const oFReader = new FileReader();
      // oFReader.readAsDataURL(image.files[0]);

      // oFReader.onload = function(oFReader) {
      //   imagePreview.src = oFREvent.target.result;
      // }
      const blob = URL.createObjectURL(image.files[0]);
      imagePreview.src = blob;
    }
  </script>
    
@endsection