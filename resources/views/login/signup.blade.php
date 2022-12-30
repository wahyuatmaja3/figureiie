@extends('layout.submain')

@section('container')
    <div class="flex flex-row ">
        <div class="basis-1/2 bg-accent h-full">
            <div id="logo" class="w-full">
                <a  href="/" class="btn btn-ghost normal-case text-xl font-thin mt-3 ml-3" style="font-family: dish out">Figure <p class="font-extrabold">いいえ</p></a>
            </div>

        </div>
        <div class="basis-1/2 h-screen overflow-auto">
            {{-- Form --}}
            <div class="container w-full px-40 mt-20">
                <p class="text-3xl font-semibold font-serif">Create an account!</p>
                <p class="text-md  mb-5 text-slate-400">Enter the field to get started</p>

                <form action="">

                    <div class="form-control w-full mb-2">
                        <label for="" class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" name="username" id="username" class="input input-bordered input-md" placeholder="John Doe" autocomplete="off">
                    </div>
                    
                    <div class="form-control w-full mb-2">
                        <label for="" class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="text" name="email" id="email" class="input input-bordered input-md" placeholder="example@gmail.com" autocomplete="off">
                    </div>
                    <div class="form-control w-full mb-2">
                        <label for="" class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" id="password" class="input input-bordered input-md" placeholder="at least 8 characters" autocomplete="off">
                    </div>
                    <div class="form-control w-full mb-2">
                        <label for="" class="label">
                            <span class="label-text">Phone</span>
                        </label>
                        <input type="tel" name="phone" id="phone" class="input input-bordered input-md" placeholder="Your number phone" autocomplete="off">
                    </div>
                    <div class="form-control w-full max-w-xs mb-2">
                        <label class="label">
                            <span class="label-text">Sex</span>
                        </label>
                        <select class="select select-bordered">
                            <option disabled selected>Pick one..</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-control w-full mb-2">
                        <label for="" class="label">
                            <span class="label-text">Date of Birth</span>
                        </label>
                        <input type="date" name="dateofbirth" id="date" class="input input-bordered input-md" autocomplete="off">
                    </div>
                    <div class="form-control">
                        <label class="label">
                          <span class="label-text">Address</span>
                        </label> 
                        <textarea class="textarea textarea-bordered h-24" placeholder="Jl. Raya no 1, Kecamatan, Kota"></textarea>
                        <label class="label">
                        </label> 
                      </div>
                    <input type="submit" class="btn btn-secondary w-full mt-5" value="Login">
                </form>
                <p class="text-sm w-full my-3 text-center">
                    Already have an account
                    <a href="{{ url('/login') }}" class="link link-primary">Login</a>
                </p>
            </div>
        </div>
        </div>
    </div>
@endsection