@extends('layout.main')

@section('container')
<div class="flex flex-wrap lg:flex-nowrap md:px-20 pt-10">
    <div class="lg:basis-7/12 grid grid-cols-2 gap-4 mb-10">
        @if (!$images->isEmpty())
            @foreach ($images as $image)
            <div class="justify-center bg-gray-100 rounded-lg p-10 hidden lg:block first:col-start-1 first:block first:col-end-3">

                <img src="{{ asset('storage') . '/' . 'figure-images/' . $image['name'] }}" alt="">
            </div>
            @endforeach
            
        @else

        <div class="flex justify-center items-center bg-gray-100 rounded-lg p-10 col-start-1 col-end-3">

            <p class="">This figure has no images!</p>
        </div>
            
        @endif
        {{-- <div class="justify-center  bg-gray-100 rounded-lg p-10 col-start-1 col-end-3">

            <img src="{{ url('assets/img/figure.png') }}" alt="">
        </div>

        <div class="justify-center  bg-gray-100 rounded-lg p-10 hidden lg:block">

            <img src="{{ url('assets/img/figure.png') }}" alt="">
        </div> --}}
        {{-- <div class="justify-center  bg-gray-100 rounded-lg p-10 hidden lg:block">

            <img src="{{ url('assets/img/figure.png') }}" alt="">
        </div>
        <div class="justify-center  bg-gray-100 rounded-lg p-10 hidden lg:block">

            <img src="{{ url('assets/img/figure.png') }}" alt="">
        </div>
        <div class="justify-center  bg-gray-100 rounded-lg p-10 hidden lg:block">

            <img src="{{ url('assets/img/figure.png') }}" alt="">
        </div> --}}
    </div>
    <div class="grow px-10 sticky">
        <p class="text-3xl text-primary font-bold mb-5">{{ $figure->name }}</p>
        <p class="text-2xl font-bold">{{ number_format($figure->price, 0, ",", ".") }}IDR</p>
        <p class="text-lg font-bold mt-10">Description</p>
        <hr >
        <div class="grid grid-cols-2">

            <p class="text-lg text-slate-600 my-2">Release date: {{ preg_replace('/(\d{2}):(\d{2}):(\d{2})/', '', $figure->created_at) }}</p>
            <p class="text-lg text-slate-600 my-2">Franchise: {{ $figure->franchise->name }}</p>
            <p class="text-lg text-slate-600 my-2">Brand: {{ $figure->brand->name }}</p>
            <p class="text-lg text-slate-600 my-2">Category: {{ $figure->Category->name }}</p>
            <p class="text-lg text-slate-600 my-2">Material: {{ $figure->material }}</p>
            <p class="text-lg text-slate-600 my-2">Character: {{ $figure->chara }}</p>
            <p class="text-lg text-slate-600 my-2">Size: {{ $figure->size }}</p>
        </div>
        <form action="{{ url('/cart') }}" method="POST">
        @csrf
            <input type="hidden" name="idFigure" value="{{ $figure->id }}">
            @if (is_null($images->first()))
            <input type="hidden" name="img" value="">
            
            @else
            <input type="hidden" name="img" value="{{ $images->first()->name }}">
                
            @endif
            <div class="form-control w-20">
                <label class="label">
                  <span class="label-text font-bold">Quantity</span>
                </label>
                <select class="select select-bordered" name="qty">
                    <option selected>1</option>
                    <option>2</option>
                    <option>3</option>
                  <option disabled >Maximum 3 unit per customer</option>
                </select>
              </div>
            <button type="submit" class="btn btn-neutral rounded-full btn-outline w-full my-6">Add to cart</button>
        </form>
    </div>
</div>
<div class="w-full p-5 lg:p-20 flex flex-wrap justify-items-center">
    <div class="text-4xl text-primary">
        You might also like
    </div>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($figures as $figure)
                <div class="card card-compact w-auto bg-base-100 shadow-sm hover:shadow-lg rounded-none" style="height: 28rem">
                    {{-- <figure class="h-4/6 image-full" style="background-image: url(https://placeimg.com/1000/800/arch)"></figure> --}}
                    <figure class="px-3 py-3 h-4/6 bg-gray-100 rounded-md">
                        <img src="{{ url('assets/img/figure.png') }}" alt="Shoes" class="max-h-full" />
                      </figure>
                    <div class="card-body">
                        <a href='/figures/{{ $figure->slug }}' class="card-title hover:text-accent" style="font-size: 1rem">{{ $figure->name }}</a>
                        <p class="font-bold text-lg mt-auto">{{ "Rp " . number_format($figure->price, 0, ",", ".") }}</p>
                    </div>
                  </div>
        @endforeach
    </div>
</div>
@endsection