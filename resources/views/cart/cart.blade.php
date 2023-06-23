@extends('layout.main')

@section('container')

<div class="mx-auto mt-6 flex flex-wrap justify-center">
  @if ($cart->count() <= 0)
  <div class="mx-auto w-2/3">
      
    <div class="w-full flex justify-center pt-16 flex-wrap">

      <p class="text-lg w-full text-center mb-5">You dont have any items in your cart yet!</p>
      <a href="{{ url('/') }}" class="btn btn-primary text-primary-content">Return to home</a>
  </div>
  </div>
  @else

  <div class="w-10/12">

  <table class="border-collapse w-full mb-10">
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

        <tr onclick="document.location = '/figures/{{ $item->options->slug }}' " class="cursor-pointer bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0 border-y-2 border-gray-400 ">
            <td  class="w-full lg:w-auto p-3 text-neutral text-center block lg:table-cell relative lg:static">
              <div class="avatar place-self-start mr-5">
                <div class="w-80 lg:w-28 rounded-xl flex items-center justify-center">
                  @if ( is_null($item->options->img))
                      <p class="text-sm m-auto">There is no images!</p>
                      
                  @else
                      
                  <img src="{{ asset('storage') . '/' . 'figure-images/' . $item->options->img }}" />
                  
                  @endif
                </div>
              </div>
            <p class="lg:text-md text-xl font-bold">{{ $item->name }}</p>
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
                <button type="submit" class="btn btn-warning lg:btn-ghost mx-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                  </svg>
                  <p class="ml-3 lg:hidden">Remove</p>
                </button>
              </form>
            </td>
            
            
        </tr>
      @endforeach
      
        <tr class="bg-white flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0 lg:border-y-2 border-gray-400 ">
          <td colspan="3" class="py-6 mr-auto"><p class="w-full text-center font-bold">Total</p></td>
          <td colspan="" class="py-6"><p class="w-full text-center font-bold">RP. {{ Cart::subtotal() }}</p></td>
        </tr>


    </tbody>
  </table>
  <div class="flex justify-center">
    <a href="{{ url('/checkout') }}" class="btn btn-primary uppercase ">Checkout</a>

  </div>

  </div>

  @endif

  
</div>
<div class="h-96 lg:h-28"></div>

@endsection
