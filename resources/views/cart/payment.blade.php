@extends('layout.checkout')

@section('container')
<div class="w-full rounded-lg border-black p-4 mb-8" style="border-width: 1px">
    <div class="flex">
        <p class="text-sm text-gray-500 w-20">Contact</p>
        <p>{{ Auth::user()->email }}</p>
    </div>
    <hr class="my-4">
    <div class="flex">
        <p class="text-sm text-gray-500 w-20">Address</p>
        <p>{{ session('information')['address'] }}</p>
    </div>
    <hr class="my-4">
    <div class="flex">
        <p class="text-sm text-gray-500 w-20">Shipping</p>
        <p>{{ $shipping->name }}</p>
        <p class="ml-auto text-sm font-bold">Rp. {{ number_format($shipping->price, 0, ",", ".") }}</p>
    </div>
</div>

<div class="rounded border border-black w-full mt-4">
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

  <div class="flex justify-between mt-10 col-start-1 col-end-3">
    <a href="{{ url('/checkout/shipping') }}" class="btn btn-ghost"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Return to Shipping
    </a>
    <button type="submit" class="btn btn-primary" id="pay-button">Pay Now</button>
</div>
<form action="" method="POST" id="submit-form">
    @csrf
    <input type="hidden" name="json" id="json_callback">
</form>

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

    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
         window.snap.pay('{{ $snap_token }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
            send_response_to_form(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
            send_response_to_form(result);

          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
            send_response_to_form(result);

          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
            send_response_to_form(result);

          }
        })
        // customer will be redirected after completing payment pop-up
    });

    function send_response_to_form(result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit-form').submit();
    }

  </script>

@endsection