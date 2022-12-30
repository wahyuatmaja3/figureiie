@extends('admin.layout.main')

@section('content')
<div class="card w-4/6 mx-auto mt-3 bg-white shadow-xl">
    <div class="card-body">
      <h2 class="card-title">Add Figure</h2>
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
            <input type="text" placeholder="Your figure name" name="name" class="input input-bordered w-full " value="{{ old('name') }}" />
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
            <input type="text" placeholder="100.000" name="price" class="input input-bordered w-full "  value="{{ old('price') }}"/>
        </div>
        <div class="form-control mb-2 w-full ">
            <label class="label">
              <span class="label-text">Chara</span>
              <span class="label-text">
                @error('chara')
                  <p class="text-red-600">{{ $message }}</p>
                @enderror
              </span>
            </label>
            <input type="text" placeholder="Character name" name="chara" class="input input-bordered w-full "  value="{{ old('chara') }}"/>
        </div>
        <div class="flex gap-2">

          <div class="form-control">
            <label class="label">
              <span class="label-text">Size</span>
              <span class="label-text">
                @error('size')
                  <p class="text-red-600">{{ $message }}</p>
                @enderror
              </span>
            </label>
            <label class="input-group">
              <input type="text" placeholder="10" name="size" class="input input-bordered w-full" value="{{ old('size') }}" />
              <span>mm</span>
            </label>
          </div>
          <div class="form-control mb-2 w-full">
              <label class="label">
                  <span class="label-text">material</span>
                  <span class="label-text">
                    @error('material')
                      <p class="text-red-600">{{ $message }}</p>
                    @enderror
                  </span>
              </label>
              <select class="select select-bordered" name="material">
                  <option disabled selected>Pick one</option>
                  @foreach ($materials as $material)
                      <option value={{ $material["id"] }} {{ (old('material') == $material["id"]) ? "selected" : "" }}>{{ $material["name"] }}</option>
                  @endforeach
              </select>
          </div>
        </div>
        <div class="form-control mb-2 w-full">
            <label class="label">
                <span class="label-text">Brand</span>
                <span class="label-text">
                  @error('brand_id')
                    <p class="text-red-600">{{ $message }}</p>
                  @enderror
                </span>
            </label>
            <select class="select select-bordered" name="brand_id">
                <option disabled selected>Pick one</option>
                @foreach ($brands as $brand)
                    <option value={{ $brand->id }} {{ (old('brand_id') == $brand->id) ? "selected" : "" }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control mb-2 w-full ">
            <label class="label">
                <span class="label-text">Franchise</span>
                <span class="label-text">
                  @error('franchise_id')
                    <p class="text-red-600">{{ $message }}</p>
                  @enderror
                </span>
            </label>
            <select class="select select-bordered" name="franchise_id">
                <option disabled selected>Pick one</option>
                @foreach ($franchises as $franchise)
                  <option value={{ $franchise->id }} {{ (old('franchise_id') == $franchise->id) ? "selected" : "" }}>{{ $franchise->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control mb-2 w-full ">
            <label class="label">
                <span class="label-text">Category</span>
                <span class="label-text">
                  @error('category_id')
                    <p class="text-red-600">{{ $message }}</p>
                  @enderror
                </span>
            </label>
            <select class="select select-bordered" name="category_id">
                <option disabled selected>Pick one</option>
                @foreach ($categories as $category)
                  <option value={{ $category->id }} {{ (old('category_id') == $category->id) ? "selected" : "" }}>{{ $category->name }}</option>
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
            <input type="file" class="file-input file-input-bordered w-full h-" id="image" name="images[]" accept="image/*" onchange="previewImage()" multiple />
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