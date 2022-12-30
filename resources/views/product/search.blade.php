@extends('layout.main')

@section('container')
<div class="card mt-10 mx-3 md:mx-20 bg-base-100 rounded-none bg-none">
    @if ($figures->isEmpty())
    <p class="text-3xl font-bold mb-2">Sorry, no product name matched with '{{ $keyword }}'</p>
    @else
    <p class="text-3xl font-bold mb-2">Search result for '{{ $keyword }}'</p>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
            
        @foreach ($figures as $figure) 
        
            @php
    
            // Highlighting the keyword
            $higlight = $figure->name;
            $pos = strpos(strtolower($figure->name), strtolower($keyword));
            
            if ($pos !== false) {
                $higlight = substr($figure->name, 0, $pos);
                $higlight .= "<span class='text-info'>" . substr($figure->name, $pos, strlen($keyword)) . '</span>';
                $higlight .= substr($figure->name, $pos + strlen($keyword));
            } else {
                $higlight = $figure->name;
            }

            @endphp
                <div class="card card-compact w-auto bg-base-100 shadow-sm hover:shadow-lg rounded-none" style="height: 28rem">
                    {{-- <figure class="h-4/6 image-full" style="background-image: url(https://placeimg.com/1000/800/arch)"></figure> --}}
                    <figure class="px-3 py-3 h-4/6 bg-gray-100 rounded-md">
                        <img src="assets/img/figure.png" alt="Shoes" class="max-h-full" />
                      </figure>
                    <div class="card-body">
                        <a href='/figures/{{ $figure->slug }}' class="font-bold hover:text-accent" style="font-size: 1rem">{!! $higlight !!}</a>
                        <p class="font-bold text-lg mt-auto">{{ "Rp " . number_format($figure->price, 0, ",", ".") }}</p>
                    </div>
                  </div>
        @endforeach
    </div>
    @endif  
</div>
@endsection