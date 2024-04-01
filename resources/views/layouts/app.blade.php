{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
         crossorigin="anonymous" referrerpolicy="no-referrer" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <title>Document</title>
    
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>

    <style>
        .dropdown-toggle{
            margin-top: 5px;
        }
    </style>
    <header class="header">
        <div class="header-content responsive-wrapper">
            <div class="header-logo">
                <a href="">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>
            <div class="header-navigation">
                <nav class="header-navigation-links">
                    {{-- <a href="#"> Home </a> --}}
                </nav>
                <div class="header-navigation-actions">
                    <div class="row justify-content-end">
                        <div class="col-auto d-flex">

                            <div class="">
                                {{-- <i class="text-success fs-2 bi bi-person-check mx-2 mb-1"></i> --}}


                                {{-- <img src="{{ asset('avatar_img/avatar.png') }}" alt="" width="100"> --}}

                                {{-- @if(auth()->user()->image == null) --}}
                                    <img alt="image" src="{{ auth()->user()->image ?? asset('avatar_img/avatar.png') }}" class="rounded-circle mr-1" width="40">
                                {{-- @endif --}}



                            </div>

                            <div class="dropdown mt-2">
                                {{-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                  Dropdown link
                                </a> --}}

                                {{-- <i class="text-success fs-2 bi bi-person-check btn dropdown-toggle p-0"  role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"></i> --}}

                                {{-- <div class="mt-2">
                                    <a class="username mx-3 btn dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> {{ auth()->user()->name }}</a>
                                </div> --}}


                                {{-- <div class="mt-2"> --}}
                                    <a class="btn-no-outline dropdown-toggle p-3 text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ auth()->user()->name }}
                                    </a> 
                                {{-- </div> --}}

                              

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                  {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                                  <li>
                                    
                                    {{-- <a class="dropdown-item" href="{{ route('logout') }}">Logout</a> --}}
                                    <form action="{{ route('logout') }}" class="button" method="POST">
                                        @csrf
                                        {{-- <button class="btn btn-no-outline " type="submit"><span>Logout</span></button> --}}

                                        <input type="submit" class="btn btn-no-outline" value="Logout">
                                    </form>

                                   </li>
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="col-auto">
                            <form action="/logout" class="button" method="POST">
                                @csrf
                                <button class="btn" type="submit"><span>Logout</span></button>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>

    

        <!-- Page Content -->
        {{-- <main> --}}
            {{ $slot }}
        {{-- </main> --}}



        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

