@extends('layout.checkout')

@section('container')

        {{-- TODO: Collapse Items --}}
        
        
        <p class="font-bold text-lg">Contact Information</p>

        <input type="text" placeholder="You can't touch this" class="input input-bordered w-full " disabled value="{{ Auth::user()->email }}" />

        <p class="font-bold text-lg mt-8">Shipping Address</p>
        <form action="{{ url('/checkout/information') }}" method="post" class="grid grid-cols-2 gap-3">
            @csrf
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">First Name</span>
                    <span class="label-text">
                        @error('fname')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </span>
                </label>
                <input type="text" name="fname" placeholder="John" class="input input-bordered w-full" value="{{ session('information')['fname'] ?? old('fname') }}"/>
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Last Name</span>
                    <span class="label-text">
                        @error('lname')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </span>
                </label>
                <input type="text" name="lname" placeholder="Doe" class="input input-bordered w-full" value="{{ session('information')['lname'] ?? old('lname') }}"/>
            </div>
            <div class="form-control w-full col-start-1 col-end-3 ">
                <label class="label">
                    <span class="label-text">Address</span>
                    <span class="label-text">
                        @error('address')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </span>
                </label>
                <input type="text" name="address" placeholder="Jl. Jupiter no 12, Penjaringan Sari, Rungkut" class="input input-bordered w-full " value="{{ session('information')['address'] ?? old('address') }}"/>
                </label>
            </div>
            <div class="form-control w-full col-start-1 col-end-3 ">
                <label class="label">
                    <span class="label-text">Label</span>
                    <span class="label-text">
                        @error('label')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </span>
                </label>
                <input type="text" name="label" placeholder="Private House, Rented home, Apartment, Suite, etc.." class="input input-bordered w-full " value="{{ session('information')['label'] ?? old('label') }}"/>
                </label>
            </div>
            <div class="form-control w-full col-start-1 col-end-3 ">
                <label class="label w-full">
                    <span class="label-text">Phone Number</span>
                    <span class="label-text">
                        @error('phone')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </span>
                </label>
                <label class="input-group w-full">
                    <span>+62</span>
                    <input type="tel" name="phone" placeholder="088888888888" class="input input-bordered w-full" value="{{ session('information')['phone'] ?? old('phone') }}"/>
                </label>
            </div>
            <div class="flex justify-between mt-10 col-start-1 col-end-3">
                <a href="{{ url('/') }}" class="btn btn-ghost"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                    Return to cart
                </a>
                <button type="submit" class="btn btn-primary">Continue to Shipping</button>
            </div>
        </form>
    

@endsection