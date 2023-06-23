@extends('layout.main')

@section('container')
@if (session()->has('message'))
<div class="alert alert-error shadow-lg">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      <span>{{ session('message') }}</span>
    </div>
</div>
@endif
<div class="p-10 mx-auto w-5/12 my-5">    
    <p class="text-3xl font-bold text-secondary">
        Change Password
    </p>
    <form action="{{ url('/user/change-password') }}" method="POST">
        @csrf

        <div class="form-control w-full mb-2">
            <label for="old_password" class="label">
                <span class="label-text">Old Password</span>
                @error('old_password')
                    <span class="label-text text-red-600">{{ $message }}</span>    
                @enderror
            </label>
            <input type="text" name="old_password" id="old_password" class="input input-bordered input-md" placeholder="" autocomplete="off" value="{{ old('old_password') }}">
        </div>

        <div class="form-control w-full mb-2">
            <label for="password" class="label">
                <span class="label-text">New Password</span>
                @error('password')
                    <span class="label-text text-red-600">{{ $message }}</span>    
                @enderror
            </label>
            <input type="text" name="password" id="password" class="input input-bordered input-md" placeholder="" autocomplete="off" value="{{ old('password') }}">
        </div>
        <div class="form-control w-full mb-2">
            <label for="password_confirmation" class="label">
                <span class="label-text">Confirm New Password</span>
                @error('password_confirmation')
                    <span class="label-text text-red-600">{{ $message }}</span>    
                @enderror
            </label>
            <input type="text" name="password_confirmation" id="password_confirmation" class="input input-bordered input-md" placeholder="" autocomplete="off" value="{{ old('password_confirmation') }}">
        </div>
        
        <input type="submit" class="btn btn-secondary w-full mt-5" value="Change Password">
    </form>
</div>

@endsection