@extends('layout.main')

@section('container')
@if (session()->has('pass-updated'))
<div class="alert alert-success shadow-lg w-full mx-10 mt-5">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      <span>{{ session('pass-updated') }}</span>
    </div>
</div>
@endif
<div class="container px-5 mx-auto mt-10 md:flex flex-wrap justify-between gap-5 w-full">
    <div class="card bg-base-100 shadow-xl w-full lg:w-4/12 h-4/6">
        <div class="card-body flex justify-center">
            <div class="avatar mx-auto">
                <div class="w-36 rounded-full">
                  <img src="https://placeimg.com/192/192/people" />
                </div>
              </div>
              
            @can('admin')
                
            <div class="badge mx-auto">Admin</div>
            @endcan

            <p class="text-2xl font-bold text-center mb-6">{{ $user->username }}</p>

            @can('admin')
            <a href="{{ url("admin") }}" class="btn btn-info rounded-badge">Go to dashboard</a>
            @endcan
            
              <a href="{{ url('user/change-password') }}" class="link primary-link my-4">
                Change Password
              </a>

            <form action="{{ url("/user/logout") }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-error btn-sm flex justify-between  h-12 rounded-lg p-3">
                Logout
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-5" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
              </button>
            </form>
            
        </div>
      </div>
      <div class="card bg-base-100 shadow-xl grow mb-10">
        <div class="card-body">
          <h2 class="card-title">Account Details</h2>
          <div class="divider"></div> 
          <form action="">
            <div class="container grid grid-cols-2 gap-4">
                <div class="form-control max-w-xs">
                    <label class="label">
                    <span class="label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ $user->username }}" disabled  />
                </div>
                <div class="form-control max-w-xs">
                    <label class="label">
                    <span class="label-text">Email</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ $user->email }}" />
                </div>
                <div class="form-control max-w-xs">
                    <label class="label">
                    <span class="label-text">Phone</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ $user->phone }}" />
                </div>
                <div class="form-control flex-1  max-w-xs">
                  <label class="label">
                    <span class="label-text">Sex</span>
                  </label>
                  <select class="select select-bordered">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                <div class="form-control col-span-2">
                  <label class="label">
                    <span class="label-text">Address</span>
                  </label> 
                  <textarea class="textarea textarea-bordered h-24" placeholder="Bio">{{ $user->address }}</textarea>
                  <label class="label">
                  </label> 
                </div>

            </div>
          </form>
        </div>
      </div>
</div>
@endsection