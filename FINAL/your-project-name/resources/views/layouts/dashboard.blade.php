@php
    use App\Http\Controllers\Admin\ProductController;
    
    if (auth()->user()) {
        $total=ProductController::cartNumber();
    
    }
        
    
@endphp



<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>wwpcshop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                  <img src="{{ asset('/img/icons/logo11.svg') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                      
                    
                      

                        
                       
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        
                        @if (auth()->user()->type!==1 )
                        <li class="nav-item">  <span class="badge bg-secondary">{{ $total }}</span></li>
                           
                             <li class="nav-item text-white">
                                <a href="{{ route('product.cart_list') }}">
                                    <img width="30px" height="30px" src="{{ asset('storage/icons/white_cart_icon.png') }}" alt="">
                                </a>
                             </li>
                        @endif
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @if (auth()->user()->type == 1)
                                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Admin Section</a>
                                    @endif
                                  

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                      
                    </ul>
                </div>
            </div>
        </nav>

        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">JOV-ECOMERCE</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                  @foreach ($parentCategories as $parentCategory)
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ $parentCategory->name }}
                    </a>

                    @if(count($parentCategory->subcategory))
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      @foreach ($parentCategory->subcategory as $subcategory)
                         <li><a class="dropdown-item" href="#">{{ $subcategory->name }}</a></li>
                      @endforeach
                     
                    </ul>
                   @endif 
                    
                   
                   
                  
                  </li>
                  @endforeach
                
                </ul>
              </div>
            </div>
          </nav> --}}

          <div class="row">
            <div class="col-md-6">
             
                 
                 
                
               
                  
                
              
            </div>
          </div>
         

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<div class="container">
    <footer>
        <hr>
        <div class="row">
             <div class="col-md-8 offset-md-2">
                 <p style="font-size: 0.8rem" class="text-center text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis voluptas aperiam necessitatibus, non ipsum numquam minus? Quod ab libero voluptatem sint voluptas quisquam ipsum quas, obcaecati, aliquam nobis dolore ipsa.</p>
             </div>
         </div> 
         <div class="row">
             <div class="col-md-4 offset-md-4 text-center">
                 <img style="margin-right: 10px" height="15px" width="15px" src="{{ asset('social icons/facebook.png') }}" alt="">
                 <img style="margin-right: 10px" height="15px" width="15px" src="{{ asset('social icons/twitter.png') }}" alt="">
                 <img style="margin-right: 10px" height="15px" width="15px" src="{{ asset('social icons/youtube.png') }}" alt="">
                 <img style="margin-right: 10px" height="15px" width="15px" src="{{ asset('social icons/linkedin.png') }}" alt="">
                 <img style="margin-right: 10px" height="15px" width="15px" src="{{ asset('social icons/instagram.png') }}" alt="">
             </div>
         </div>
         <div style="background: rgb(250, 247, 247);margin-top:10px;font-size:0.8rem" class="text-center text-muted"> 2022 Copyright by WWPCSHOP</div>
     </footer>
</div>
 
</body>
</html>
