@extends('layout.main')

@section('container')
{{-- <div class="rounded border border-black mt-4 mx-20">
    <!-- Tabs -->
    <ul id="tabs" class="inline-flex pt-2 px-1 w-full border-b border-black">
      <li class="bg-white px-4 text-gray-800 font-semibold py-2 rounded-t border-t border-r border-l border-black -mb-px"><a id="default-tab" href="#first">COD</a></li>
      <li class="px-4 text-gray-800 font-semibold py-2 rounded-t border-black"><a href="#second">Credit card</a></li>
    </ul>
  
    <!-- Tab Contents -->
    <div id="tab-contents">
      <div id="first" class=" px-10 py-8">
        <p class="font-bold text-lg">Cash on Delivery</p>
      </div>
      <div id="second" class="hidden px-10 py-8">
        <p class="font-bold text-lg">Credit Card</p>
        <form action="">
            <div class="form-control w-full col-start-1 col-end-3 ">
                <label class="label">
                    <span class="label-text">Card Number</span>
                    <span class="label-text">
                        @error('cardnum')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </span>
                </label>
                <input type="text" name="cardnum" placeholder="Card Number" class="input input-bordered w-full " value="{{ session('payment')['cardnum'] ?? old('cardnum') }}"/>
                </label>
            </div>
            <div class="form-control w-full col-start-1 col-end-3 ">
                <label class="label">
                    <span class="label-text">Cardholder Name</span>
                    <span class="label-text">
                        @error('cardname')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </span>
                </label>
                <input type="text" name="cardname" placeholder="Cardholder Name" class="input input-bordered w-full " value="{{ session('payment')['cardname'] ?? old('cardname') }}"/>
                </label>
            </div>
            <div class="flex justify-between">

                <div class="form-control w-4/5">
                    <label class="label">
                        <span class="label-text">Expiration date (MM/YY)</span>
                        <span class="label-text">
                            @error('cardexp')
                                <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </span>
                    </label>
                    <input type="number" name="cardexp" placeholder="Expiration date" class="input input-bordered w-full" min="0" value="{{ session('payment')['cardexp'] ?? old('cardexp') }}"/>
                </div>
                <div class="form-control w-2/12">
                    <label class="label">
                        <span class="label-text">CVV</span>
                        <span class="label-text">
                            @error('cvv')
                                <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </span>
                    </label>
                    <input type="number" name="cvv" placeholder="cvv" class="input input-bordered w-full" min="0" value="{{ session('payment')['cvv'] ?? old('cvv') }}"/>
                </div>
            </div>
            <div class="flex justify-between mt-10 col-start-1 col-end-3">
                <a href="{{ url('/checkout/information') }}" class="btn btn-ghost"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                    Return to Information
                </a>
                <button type="submit" class="btn btn-primary">Pay now</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    let tabsContainer = document.querySelector("#tabs");

let tabTogglers = tabsContainer.querySelectorAll("#tabs a");

console.log(tabTogglers);

tabTogglers.forEach(function(toggler) {
toggler.addEventListener("click", function(e) {
    e.preventDefault();

    let tabName = this.getAttribute("href");

    let tabContents = document.querySelector("#tab-contents");

    for (let i = 0; i < tabContents.children.length; i++) {
    
    tabTogglers[i].parentElement.classList.remove("border-t", "border-r", "border-l", "-mb-px", "bg-white");  tabContents.children[i].classList.remove("hidden");
    if ("#" + tabContents.children[i].id === tabName) {
        continue;
    }
    tabContents.children[i].classList.add("hidden");
    
    }
    e.target.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px", "bg-white");
});
});

    </script> --}}

    <div class="w-8/12 mx-auto my-10">
        <p class="text-3xl font-bold mb-3">Order History</p>
        <div class="relative right-0">
          <ul
            class="relative flex list-none flex-wrap rounded-xl bg-accent p-1"
            data-tabs="tabs"
            role="list"
          >
            <li class="z-30 flex-auto text-center">
              <a
                class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                data-tab-target=""
                active=""
                role="tab"
                aria-selected="true"
                aria-controls="app"
              >
                <span class="ml-1 font-bold text-neutral">Active</span>
              </a>
            </li>
            <li class="z-30 flex-auto text-center">
              <a
                class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                data-tab-target=""
                role="tab"
                aria-selected="false"
                aria-controls="message"
              >
                <span class="ml-1 font-bold text-neutral">Shipped</span>
              </a>
            </li>
            <li class="z-30 flex-auto text-center">
              <a
                class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                data-tab-target=""
                role="tab"
                aria-selected="false"
                aria-controls="settings"
              >
                <span class="ml-1 font-bold text-neutral">Canceled</span>
              </a>
            </li>
          </ul>
          <div data-tab-content="" class="p-5">
            <div class="block opacity-100" id="app" role="tabpanel">
              <p class="block font-sans text-base font-light leading-relaxed text-inherit text-blue-gray-500 antialiased">
                @foreach ($orders as $order)
                <table class="table">
                  <tbody>
                    <tr>
                      <td># {{ $order->order_id }}</td>
                      <td>{{ $order->created_at }}</td>
                      <td>{{ $order->gross_amount }}</td>
                      <td>{{ $order->status }}</td>
                    </tr>
                  </tbody>
                </table>
                @endforeach
              </p>
            </div>
            <div class="hidden opacity-0" id="message" role="tabpanel">
              <p class="block font-sans text-base font-light leading-relaxed text-inherit text-blue-gray-500 antialiased">
              </p>
            </div>
            <div class="hidden opacity-0" id="settings" role="tabpanel">
              <p class="block font-sans text-base font-light leading-relaxed text-inherit text-blue-gray-500 antialiased">
              </p>
            </div>
          </div>
        </div>
      </div>

      <script src="{{ url("https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js") }}"></script>
@endsection