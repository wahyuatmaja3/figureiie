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
    </div>
    <p class="font-bold text-lg">Shipping Method</p>
    <form action="{{ url('/checkout/shipping') }}" method="POST" id="ship">
        @csrf
        @foreach ($shippings as $value)
        <div class="w-full rounded-lg border-black p-4 mb-4 flex items-center" style="border-width: 1px">
            <input type="radio" name="shipping" class="radio mr-4 " id="ship{{ $value->id }}" {{ $value->id == 1 ? "checked" : "" }} value="{{ $value->id }}" />
            <label for="ship{{ $value->id }}">{{ $value->name }} ( {{ $value->estimated }} day )</label>
            <p class="ml-auto">Rp. {{ number_format($value->price, 0, ",", ".") }}</p>
        </div>
        @endforeach
        <div class="flex justify-between mt-10 col-start-1 col-end-3">
            <a href="{{ url('/checkout/information') }}" class="btn btn-ghost"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                </svg>
                Return to Information
            </a>
            <button type="submit" class="btn btn-primary">Continue to Payment</button>
        </div>
    </form>

    <script>
        $(document).ready(function(){
            $('input[type=radio][name="shipping"]').change(function() {
                selected_value = $(this).val();
                value= "000";
                total = "{{ Cart::subtotal() }}";
                switch (selected_value) {
                    case "1":
                        value = "<?php echo $shippings['0']['price'] ?>"
                        
                        break;
                    case "2":
                        value = "<?php echo $shippings['1']['price'] ?>"
                        
                        break;
                    case "3":
                        value = "<?php echo $shippings['2']['price'] ?>"
                        
                        break;
                    case "4":
                        value = "<?php echo $shippings['3']['price'] ?>"
                        
                        break;
                
                        default:
                            break;
                }

                
                value = parseInt(value);
                total = total.replace(/,/g , "");
                total = total.replace("." , "");
                total = total.replace("00" , "");
                total = parseInt(total);
                
                finalTotal = total + value;

                const format = num =>
                    String(num).replace(/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g, '$1,');
                $("#shippingPrice1").text("Rp. " + format(value));
                $("#shippingPrice2").text("Rp. " + format(value));
                $("#total1").text("Rp. " + format(finalTotal)); 
                $("#total2").text("Rp. " + format(finalTotal)); 
            });
        });
    </script>

@endsection