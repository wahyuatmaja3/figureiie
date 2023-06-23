@extends('layout.submain')

@section('container')
    
        <div class="w-full h-screen overflow-auto px-44">
            {{-- Form --}}
            <div class="container w-full px-40 mt-20">
                <p class="text-3xl font-semibold font-serif">Create an account!</p>
                <p class="text-md  mb-5 text-slate-400">Enter the field to get started</p>

                <form action="{{ url('/user/signup') }}" method="POST">
                    @csrf

                    <div class="form-control w-full mb-2">
                        <label for="" class="label">
                            <span class="label-text">Username</span>
                            @error('username')
                                <span class="label-text text-red-600">{{ $message }}</span>    
                            @enderror
                        </label>
                        <input type="text" name="username" id="username" class="input input-bordered input-md" placeholder="John Doe" autocomplete="off">
                    </div>
                    
                    <div class="form-control w-full mb-2">
                        <label for="" class="label">
                            <span class="label-text">Email</span>
                            @error('email')
                                <span class="label-text text-red-600">{{ $message }}</span>    
                            @enderror
                        </label>
                        <input type="text" name="email" id="email" class="input input-bordered input-md" placeholder="example@gmail.com" autocomplete="off">
                    </div>
                    <div class="form-control w-full mb-2">
                        <label for="" class="label">
                            <span class="label-text">Password</span>
                            @error('password')
                                <span class="label-text text-red-600">{{ $message }}</span>    
                            @enderror
                        </label>
                        <input type="password" name="password" id="password" class="input input-bordered input-md" placeholder="at least 8 characters" autocomplete="off">
                    </div>
                    <div class="form-control w-full mb-2">
                        <label for="" class="label">
                            <span class="label-text">Phone</span>
                            @error('phone')
                                <span class="label-text text-red-600">{{ $message }}</span>    
                            @enderror
                        </label>
                        <input type="tel" name="phone" id="phone" class="input input-bordered input-md" placeholder="Your number phone" autocomplete="off">
                    </div>
                    <div class="form-control w-full max-w-xs mb-2">
                        <label class="label">
                            <span class="label-text">Sex</span>
                            @error('sex')
                                <span class="label-text text-red-600">{{ $message }}</span>    
                            @enderror
                        </label>
                        <select class="select select-bordered" name="sex">
                            <option disabled selected>Pick one..</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>
                    </div>
                    <div class="form-control w-full mb-2">
                        <label for="" class="label">
                            <span class="label-text">Date of Birth</span>
                            @error('dateofbirth')
                                <span class="label-text text-red-600">{{ $message }}</span>    
                            @enderror
                        </label>
                        <input type="date" name="dateofbirth" id="date" class="input input-bordered input-md" autocomplete="off">
                    </div>
                    <div class="form-control">
                        <label class="label">
                          <span class="label-text">Address</span>
                            @error('address')
                                <span class="label-text text-red-600">{{ $message }}</span>    
                            @enderror
                        </label> 
                        <textarea class="textarea textarea-bordered h-24" name="address" placeholder="Jl. Raya no 1, Kecamatan, Kota"></textarea>
                        <label class="label">
                        </label> 
                      </div>
                      <input type="hidden" name="type" value="u">
                    <input type="submit" class="btn btn-secondary w-full mt-5" value="Create an account">
                </form>
                <p class="text-sm w-full my-3 text-center">
                    Already have an account
                    <a href="{{ url('/user/login') }}" class="link link-primary">Login</a>
                </p>
            </div>
        </div>
    </div>
@endsection