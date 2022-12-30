@extends('layout.main')

@section('container')
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
            <a href="admin" class="btn btn-info rounded-badge">Go to dashboard</a>
            @endcan
        
            <ul>
                <button class="btn btn-warning tooltip tooltip-bottom" data-tip="
                in progress">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>
                </button>
                <button class="btn btn-success tooltip tooltip-bottom" data-tip="
                Order history">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                      </svg>
                </button>

            </ul>
        </div>
      </div>
      <div class="card bg-base-100 shadow-xl grow">
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