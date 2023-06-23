@extends('layout.main')

@section('container')
    
    {{-- Hero --}}
    {{-- <div class="hero h-96 mb-10" style="background-image: url(https://placeimg.com/1000/800/arch);">
        <div class="hero-overlay"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                
            </div>
        </div>
    </div> --}}
    @if (session('order-success'))
    <script>alert("{{ session('order-success') }}")</script>
    @elseif (session('order-failed'))
    <script>alert("{{ session('order-failed') }}")</script>
    @endif
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-5 md:p-10 g:p-20 gap-4">
        <div class="bg-accent h-80"></div>
        <div class="bg-accent h-80"></div>
        <div class="bg-accent h-80"></div>
        <div class="bg-accent h-80"></div>
        <div class="bg-accent h-80"></div>
        <div class="bg-accent h-80"></div>
    </div>

    <div class="card mx-3 md:mx-20 bg-base-100 rounded-none bg-none mb-60 md:mb-5">
        <p class="text-3xl font-bold mb-2">New Arrival</p>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($figures as $figure)
                    <div class="card card-compact w-auto bg-base-100 shadow-sm hover:shadow-lg rounded-none" style="height: 28rem">
                        {{-- <figure class="h-4/6 image-full" style="background-image: url(https://placeimg.com/1000/800/arch)"></figure> --}}
                        @if (!$figure->images->isEmpty())
                        
                        <figure class="px-3 py-3 h-4/6 bg-gray-100 rounded-md">
                            <img src="{{ asset('storage') . '/' . 'figure-images/' . $figure->images->first()['name'] }}" alt="Figure" class="max-h-full" />
                        </figure>
                        
                        @else

                        <figure class="px-3 py-3 h-4/6 bg-gray-100 rounded-md">
                            <img src="assets/img/figure.png" alt="Figure" class="max-h-full" />
                        </figure>

                        @endif
                        <div class="card-body">
                            <a href='/figures/{{ $figure->slug }}' class="card-title hover:text-accent" style="font-size: 1rem">{{ $figure->name }}</a>
                            <p class="font-bold text-lg mt-auto">{{ "Rp " . number_format($figure->price, 0, ",", ".") }}</p>
                        </div>
                      </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="card mx-3 md:mx-20 bg-base-100 rounded-none ">
        <p class="text-3xl font-bold mb-2">New Arrival</p>
        <div class=" flex gap-2 flex-wrap justify-start ">
            @foreach ($figures as $figure)
                    <div class="card card-compact w-56 md:w-72 bg-base-100 shadow-sm hover:shadow-lg rounded-none" style="min-height: 20rem">
                        <figure class="px-3 py-3 h-3/5 bg-gray-100 rounded-md">
                            <img src="assets/img/figure.png" alt="Shoes" class="max-h-full" />
                        </figure>
                        <div class="card-body">
                            <a href='/detail/{{ $figure->id }}' class="card-title hover:text-accent" style="font-size: 1rem">{{ $figure->name }}</a>
                            <p class="font-bold text-lg mt-auto">{{ "Rp " . number_format($figure->price, 0, ",", ".") }}</p>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>  --}}


@endsection