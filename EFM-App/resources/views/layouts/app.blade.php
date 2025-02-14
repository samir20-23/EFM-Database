 <!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
     <!-- Scripts -->
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])
     <style>
     
     table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        background-color: #ffffff;
    }
    
    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    th {
        background-color: #4f105e8a; /* Dark purple with transparency */
        color: white;
        border-bottom: 2px solid #9512b5; /* Lighter purple for border */
    }
    
    tr:nth-child(even) {
        background-color: #f9f9f9; /* Light grey for even rows */
    }
    
    tr:hover {
        background-color: #46047318; /* Green background on hover */
    }
    
    tbody tr:last-child td {
        border-bottom: none;
    }
    
    td {
        border-right: 1px solid #e0e0e0;
        vertical-align: top;
    }
    
    tbody tr td:last-child {
        border-right: none;
    }
    
    ul {
        margin: 5px 0;
        padding-left: 20px;
    }
    
    ul li {
        margin-bottom: 5px;
    }
    
    ul li strong {
        color: #333;
    }
    
    ul ul li {
        list-style-type: circle;
        color: #9512b5; /* Lighter purple for nested suggestions */
    }
    
    span {
        padding: 4px 8px;
        border-radius: 12px;
        color: #fff;
        background-color: #0fc931; /* Green background for badges */
        font-size: 0.75em;
    }
    .red{
    color: rgba(93, 0, 255, 0.577);
    background-color: red;
  }
     </style>

 </head>

 <body>
     <div id="app">
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
             <div class="container">
                 <a class="navbar-brand" href="{{ url('/') }}">
                     {{ config('app.name', 'Laravel') }}
                 </a>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                     data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                     aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                             <li class="nav-item dropdown">
                                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     {{ Auth::user()->name }}
                                 </a>

                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a>

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

         <main class="py-4">
             @yield('content')
         </main>
     </div>
 </body>

 </html>
