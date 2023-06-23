<!DOCTYPE html>
<html data-theme="lemonade" lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $step }} - Checkout</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
        <script src="https://kit.fontawesome.com/27b0bc8f27.js" crossorigin="anonymous"></script>
        <script src="{{ url('assets/js/jquery.js') }}"></script>

        <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-OxxeVcjPyOOVU06p"></script>
        
        <!-- Styles -->
       

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body style="" class="min-h-screen relative">

        <div class="flex flex-wrap lg:flex-nowrap">
            <div class="lg:w-7/12 w-full pt-10 px-5 sm:px-28 mb-16">
                <div class="w-full flex justify-center">
                    <a href="/" class="btn btn-ghost normal-case text-2xl font-thin" style="font-family: dish out">Figure <p class="font-extrabold text-primary mx-auto">いいえ</p></a>
        
                </div>
                
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="/cart">Cart</a></li> 
                        <li class="{{ Request::is('checkout/information') ? 'text-primary font-bold disabled' : '' }}"><a href="/checkout/information">Information</a></li> 
                        <li class="{{ Request::is('checkout/shipping') ? 'text-primary font-bold disabled' : '' }}"><a href="/checkout/shipping">Shipping</a></li> 
                        <li class="{{ Request::is('checkout/payment') ? 'text-primary font-bold disabled' : '' }}"><a href="/checkout/payment">Payment</a></li> 
                    </ul>
                </div>
                {{-- TODO: Collapse Items --}}
                <button class="btn btn-outline w-full flex justify-between lg:hidden mb-7" id="open-order-summary">Open Order Summary <p>Rp. {{ Cart::subtotal() }}</p></button>
        
        <div id="order-summary" class="w-full border-2 border-black p-6 rounded-md lg:hidden mb-7">
            <div class="text-xl font-bold">Order Summary</div>
            
            <div class="grid grid-cols-1">
                @foreach ($cart as $item)
                    <div class="flex items-center my-4">
                        
                        <div class="avatar indicator">
                            <span class="indicator-item badge badge-secondary">{{ $item->qty }}</span> 
                            <div class="w-16 rounded">
                                @if ( is_null($item->options->img))
                                    <img src="{{ url('https://img.icons8.com/ios/50/null/no-image.png') }}" />
                                @else
                                    <img src="{{ asset('storage') . '/' . 'figure-images/' . $item->options->img }}" />
                                @endif
                            </div>
                            
                        </div>
    
                        <p class="ml-4 text-sm">{{ $item->name }}</p>
                        <p class="font-bold ml-auto text-sm">Rp. {{ number_format($item->price, 0, ",", ".") }}</p>
    
                    </div>
                @endforeach
                <hr class="mb-10">
                <div class="flex justify-between mb-5" >
                    <p>Subtotal</p>
                    <p class="font-bold text-sm">Rp. {{ Cart::subtotal() }}</p>
                </div>
    
                <div class="flex justify-between mb-6" ">
                    <p>Shipping</p>
                    <p class="font-bold text-sm" id="shippingPrice1">Calculated at next step</p>
                </div>
    
                <hr class="mb-7">
    
                <div class="flex justify-between mb-6">
                    <p class="text-lg">Total</p>
                    <p class="font-bold text-lg" id="total1">
                        {{ 
                            App\Models\ShippingMethod::find(session('shipping')) 
                            ? "Rp". number_format(
                                (float)(str_replace(",", "", App\Models\ShippingMethod::find(session('shipping')['shipping'])->price)) 
                                + (float)(str_replace(",", "", Cart::subtotal())) , 0, ",", ".")
                            : Cart::subtotal() }}
                    </p>
                </div>
    
            </div>

            <button class="btn bg-black  w-full block lg:hidden" id="hide-order-summary">Hide Order Summary</button>

        </div>

                @yield('container')
            </div>
                

            <div class="w-5/12 border-slate-300 px-12 pt-10 hidden lg:block" style="border-left-width: 1px">
                <div class="grid grid-cols-1">
                    @foreach ($cart as $item)
                        <div class="flex items-center my-4">
                            
                            <div class="avatar indicator">
                                <span class="indicator-item badge badge-secondary">{{ $item->qty }}</span> 
                                <div class="w-16 rounded">
                                    @if ( is_null($item->options->img))
                                        <img src="{{ url('https://img.icons8.com/ios/50/null/no-image.png') }}" />
                                    @else
                                        <img src="{{ asset('storage') . '/' . 'figure-images/' . $item->options->img }}" />
                                    @endif
                                </div>
                                
                            </div>
        
                            <p class="ml-4 text-sm">{{ $item->name }}</p>
                            <p class="font-bold ml-auto text-sm w-28 text-right">Rp. {{ number_format($item->price, 0, ",", ".") }}</p>
        
                        </div>
                    @endforeach
                    <hr class="mb-10">
                    <div class="flex justify-between mb-5">
                        <p>Subtotal</p>
                        <p class="font-bold text-sm">Rp. {{ Cart::subtotal() }}</p>
                    </div>
        
                    <div class="flex justify-between mb-6">
                        <p>Shipping</p>
                        <p class="font-bold text-sm" id="shippingPrice2">{{ App\Models\ShippingMethod::find(session('shipping'))
                        ? App\Models\ShippingMethod::find(session('shipping')['shipping'])->price
                        : "Calculated at next step" }}</p>
                    </div>
        
                    <hr class="mb-7">
        
                    <div class="flex justify-between mb-6">
                        <p class="text-lg">Total</p>
                        <p class="font-bold text-lg" id="total2">{{ 
                            Request::has('shipping')
                            ? "Rp". number_format(
                                (float)(str_replace(",", "", App\Models\ShippingMethod::find(session('shipping')['shipping'])->price)) 
                                + (float)(str_replace(",", "", Cart::subtotal())) , 0, ",", ".")
                            : Cart::subtotal() }}</p>
                    </div>
        
                </div>
            </div>
        </div>
        
        
        <script>
            $(document).ready(function () {
                
                $("#open-order-summary").click(function (e) { 
                    e.preventDefault();
                    $("#order-summary").show();
                    $("#open-order-summary").hide();
                });
                
                $("#hide-order-summary").click(function (e) { 
                    e.preventDefault();
                    $("#order-summary").hide();
                    $("#open-order-summary").show();
                });
            });
                
        </script>        
        

        <script src="assets/js/carousel.js"></script>
        
    </body>
</html>
