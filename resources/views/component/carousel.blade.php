<section class="w-full">
    <div class="flex">
        <div class="w-2/12 flex items-center">
            <div class="w-full text-right">
                <button onclick="next()" class="rounded-full shadow-lg mr-5">
                    <img src="assets/img/previous.png" width="30" alt="">
                </button>
            </div>
        </div>
        <div class="w-10/12 overflow-hidden" id="sliderContainer">
            <ul id="slider" class="flex w-full border border-red-500 transition-margin duration-700">
                @foreach ($figures as $figure)
                    <li class="card bg-accent p-5 w-96">
                        <figure class="p-2">
                            <img src="https://source.unsplash.com/1000x800" alt="Shoes" class="rounded-lg" />
                        </figure>
                        <div class="card-body items-center text-center">
                            <h2 class="card-title">{{ $figure->name }}</h2>
                            
                            <div class="card-actions">
                                <button class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="w-2/12 flex items-center">
            <div class="w-full">    
                <button onclick="prev()" class="rounded-full shadow-lg ml-5">
                    <img src="assets/img/next.png" width="30" alt="">
                </button>
            </div>
        </div>
    </div>

</section>