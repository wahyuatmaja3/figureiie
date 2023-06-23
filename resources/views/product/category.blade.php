@extends('layout.main')

@section('container')
<div class="card mx-3 md:mx-20 bg-base-100 rounded-none bg-none mt-10 mb-10">
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($categories as $category)
        <div class="card w-96 bg-primary text-primary-content">
            <div class="card-body">
              <h1 class="card-title">{{ $category->name }}</h1>
            </div>
          </div>
        @endforeach
    </div>
</div>
@endsection