@extends('layout.main')

@section('container')

<div class="mx-auto mt-6 flex lg:flex-nowrap flex-wrap justify-center gap-3">
  @if ($cart->count() <= 0)
  <div class="mx-auto w-2/3">
      
    <div class="w-full flex justify-center pt-16 flex-wrap">

      <p class="text-lg w-full text-center mb-5">You dont have any items in your cart yet!</p>
      <a href="{{ url('/') }}" class="btn btn-primary text-primary-content">Return to home</a>
  </div>
  @else

  <table class="border-collapse w-8/12">
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-accent text-neutral hidden lg:table-cell">Product</th>
            <th class="p-3 font-bold uppercase bg-accent text-neutral hidden lg:table-cell">Price</th>
            <th class="p-3 font-bold uppercase bg-accent text-neutral hidden lg:table-cell">Quantity</th>
            <th class="p-3 font-bold uppercase bg-accent text-neutral hidden lg:table-cell">Subtotal</th>
            <th class="p-3 font-bold uppercase bg-accent text-neutral hidden lg:table-cell"></th>
        </tr>
    </thead>
    <tbody>
      @foreach ($cart as $item)

        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0 border-y-2 border-neutral">
            <td class="w-full lg:w-auto p-3 text-neutral text-center block lg:table-cell relative lg:static">
              <div class="avatar place-self-start mr-5">
                <div class="w-80 lg:w-28 rounded-xl flex items-center justify-center">
                  @if ( is_null($item->options->img))
                      <p class="text-sm m-auto">There is no images!</p>
                      
                  @else
                      
                  <img src="{{ asset('storage') . '/' . 'figure-images/' . $item->options->img }}" />
                  
                  @endif
                </div>
              </div>
            <a href="/figures/{{ $item->options->slug }}" class="lg:text-md text-xl font-bold hover:text-secondary">{{ $item->name }}</a>
            </td>
            <td class="w-full lg:w-auto p-3 text-neutral text-center text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase h-full ">Price</span>
                Rp. {{ number_format($item->price, 0, ",", ".") }}
            </td>
            
            <td class="w-full lg:w-auto p-3 text-neutral text-center text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase h-full ">Quantity</span>
                {{ $item->qty }}
            </td>
            <td class="w-full lg:w-auto p-3 text-neutral text-center text-center block lg:table-cell relative lg:static text-md font-bold">
                <span class="lg:hidden absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase h-full ">Subtotal</span>
                Rp. {{ number_format($item->qty * $item->price, 0, ",", ".") }}
            </td>
            <td class="w-full lg:w-auto p-3 text-neutral text-center text-center block lg:table-cell relative lg:static">

              <form action="{{ url('cart/remove') }}" method="GET">
                <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                <button type="submit" class="btn btn-warning btn-sm">remove</button>
              </form>
            </td>
            
            
        </tr>
      @endforeach

    </tbody>
  </table>
  @endif

  <div class="card w-full lg:w-96 bg-accent">
    <div class="card-body">
      <h2 class="card-title">Order Summary</h2>
      <div class="grid grid-cols-2">
        <p class="font-bold">Subtotal</p>
        <p class="text-right">Rp. {{ Cart::subtotal() }}</p>
        
        <p class="font-bold">Shipping</p>
        <p class="text-right">Calculated at next step</p>

        <span class="col-span-2 border-t-2 border-neutral mt-3 mb-10"></span>

        <span class="font-bold w-full">Estimated total</sp>
        <p class="text-right">Rp. {{ Cart::subtotal() }}</p>


      </div>
      <button class="btn btn-primary w-full uppercase mt-5">Checkout</button>
    </div>
  </div>
  
</div>
<div class="h-96 sm:h-28"></div>

@endsection
