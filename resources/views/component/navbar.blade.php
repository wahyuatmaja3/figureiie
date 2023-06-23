{{-- Navbar --}}

<div class="navbar bg-neutral text-neutral-content h-24 p-6 z-40 ">
  <div class="navbar-start">
    <div class="form-control w-full hidden md:block">
      <form action="{{ url('/search') }}" method="GET" class="flex">
        <label class="input-group">
          <input type="search" placeholder="Search" name="keyword" class="input input-bordered text-neutral" />
          <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg></button>
        </label>
      </form>
    </div>
    <div class="dropdown sm:block md:hidden">
      <label tabindex="0" class="btn btn-ghost btn-circle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
      </label>
      <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
        <li><a>Homepage</a></li>
        <li><a>Portfolio</a></li>
        <li><a>About</a></li>
      </ul>
    </div>
  </div>
  <div class="navbar-center ">
    <a href="/" class="btn btn-ghost normal-case text-2xl font-thin" style="font-family: dish out">Figure <p class="font-extrabold text-primary">いいえ</p></a>
  </div>
  <div class="navbar-end">

    <div class="indicator">
      <a href="{{ url('/cart') }}" class="btn btn-ghost p-2 mx-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
          <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
        </svg>
          <span class="indicator-item indicator-middle indicator-center badge bg-transparent border-none text-sm mt-1 text-current">{{ Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}</span> 
        </a>
      </div>
    
    @auth
          
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
              <img src="https://placeimg.com/80/80/people" alt="">
          </div>
      </label>
      <ul tabindex="0" class="mt-3 p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
          <li class="text-neutral">
              <a href="{{ url('/user/profile') }}" class="justify-between">
                  Profile
              </a>
          </li>
          <li class="text-neutral">
              <a href="{{ url('/user/order-history') }}" class="justify-between">
                  Order History
              </a>
          </li>
          <form action="{{ url("/user/logout") }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-error flex justify-between w-full h-12 rounded-lg align-center p-3">
                Logout
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-auto" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
              </button>
          </form>
      </ul>
    </div>

    @else

    <a href="{{ url("/user/login") }}" class="btn btn-accent">Login</a>
    
    @endauth
  </div>
</div>
<div class="sticky top-0 z-30 bg-base-100 flex justify-center gap-3 py-1 border-b-2 border-neutral">
  {{-- Categories --}}
  <div class="dropdown dropdown-hover">
    <label tabindex="0" class="btn btn-md btn-link no-underline text-current hover:text-primary m-1">
      Categories
      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
      </svg>
    </label>
    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
      <li><a>Item 1</a></li>
      <li><a>Item 2</a></li>
    </ul>
  </div>
  {{-- Brands --}}
  <div class="dropdown dropdown-hover">
    <label tabindex="0" class="btn btn-md btn-link no-underline text-current hover:text-primary m-1">
      Brands
      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
      </svg>
    </label>
    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
      <li><a>Item 1</a></li>
      <li><a>Item 2</a></li>
    </ul>
  </div>
  
  {{-- Franchises --}}
  <div class="dropdown dropdown-hover">
    <label tabindex="0" class="btn btn-md btn-link no-underline text-current hover:text-primary m-1">
      Franchises
      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
      </svg>
    </label>
    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
      <li><a>Item 1</a></li>
      <li><a>Item 2</a></li>
    </ul>
  </div>

</div>
{{-- 
<div class="navbar bg-neutral text-neutral-content px-6 sticky top-0 z-50 drop-shadow-lg">
    <div class="flex-1">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost md:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
              <li><a>Item 1</a></li>
              <li tabindex="0">
                <a>
                  Parent
                  <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </a>
                <ul class="p-2">
                  <li><a>Submenu 1</a></li>
                  <li><a>Submenu 2</a></li>
                </ul>
              </li>
              <li><a>Item 3</a></li>
              <li>
                <a href="" class="justify-between">
                    Profile
                </a>
              </li>
            </ul>
          </div>
      <a class="btn btn-ghost normal-case text-xl font-thin" style="font-family: dish out">Figure <p class="font-extrabold text-primary">いいえ</p></a>
      <ul class="menu menu-horizontal p-0 mx-4 hidden md:flex">
        <li tabindex="0">
          <a>
            Categories
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
          </a>
          <ul class="p-2 bg-base-100">
            <li><a>General Figures</a></li>
            <li><a>Nendoroids</a></li>
            <li><a>Figma</a></li>
          </ul>
        </li>
        <li tabindex="0">
          <a>
            Francshise
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
          </a>
          <ul class="p-2 bg-base-100">
            <li><a>General Figures</a></li>
            <li><a>Nendoroids</a></li>
            <li><a>Figma</a></li>
          </ul>
        </li>

      </ul>
    </div>
    <div class="flex-none hidden md:flex">
      <div class="form-control w-full">
        <form action="">
          <input type="text" placeholder="Search" class="input input-bordered" />
          <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg></button>
        </form>
      </div>
      <div class="indicator">
      <a href="" class="btn btn-ghost p-2 mx-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
          <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
        </svg>
          <span class="indicator-item indicator-middle indicator-center badge bg-transparent border-none text-sm mt-1 text-current">0</span> 
        </a>
      </div>
      
      @auth
          
      <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
                <img src="https://placeimg.com/80/80/people" alt="">
            </div>
        </label>
        <ul tabindex="0" class="mt-3 p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
            <li>
                <a href="{{ url('/profile') }}" class="justify-between">
                    Profile
                </a>
            </li>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-error flex justify-between w-full h-12 rounded-lg align-center p-3">
                  Logout
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-auto" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>
                </button>
            </form>
        </ul>
      </div>

      @else

      <a href="/login" class="btn btn-accent">Login</a>
      
      @endauth
    </div>
  </div> --}}
{{-- end Navbar --}}