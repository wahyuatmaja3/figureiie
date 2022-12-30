@extends('layout.submain')

@section('container')
    <div class="flex flex-row h-screen ">
        <div class="basis-1/2 h-full ">
            {{-- logo --}}
            <div id="logo" class="w-full">
                <a  href="/" class="btn btn-ghost normal-case text-xl font-thin mt-3 ml-3" style="font-family: dish out">Figure <p class="font-extrabold">いいえ</p></a>
            </div>

            {{-- Form --}}
            <div class="container w-full px-36 mt-12">
                <p class="text-3xl font-semibold font-serif">Welcome back!</p>
                <p class="text-md  mb-5 text-slate-400">Enter your credential to access your account</p>

                @if (session()->has('loginError'))
                    <div class="alert alert-error shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>{{ session('loginError') }}</span>
                        </div>
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf
                    <div class="form-control w-full mb-2">
                        @error('email')
                            <div class="alert alert-error shadow-sm">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                        <label for="" class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="text" name="email" id="email" class="input input-bordered input-md" placeholder="Enter your Email" autocomplete="off" required>
                    </div>
                    <div class="form-control w-full mb-2">
                        @error('password')
                            <div class="alert alert-error shadow-sm">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                        <label for="" class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" id="password" class="input input-bordered input-md" placeholder="Password" required>
                    </div>
                    <button class="btn btn-secondary w-full mt-5" type="submit">Login</button>
                </form>
                <p class="text-sm w-full my-3 text-center">
                    Don't have an account yet?
                    <a href="{{ url('/signup') }}" class="link link-primary">Sign up</a>
                </p>
            </div>
        </div>
        <div class="basis-1/2 bg-primary h-full" id="hero">
            
        </div>
    </div>
    
@endsection