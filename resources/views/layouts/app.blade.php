<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <title>{{ config('app.name', 'P48InvestmentLtd') }}</title>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>

    <style>
        .dropdown-toggle{
            margin-top: 5px;
        }

        .main-color{
            color:#009933;
        }

        .alert-link{
            text-decoration: underline;
            color: rgb(247, 239, 239) !important; 
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

                                @if (auth()->user()->image == null)
                                  <a href="{{ route('profile.edit') }}">
                                    <img alt="image" src="{{ asset('avatar_img/avatar.png') }}" class="rounded-circle mr-1" width="40" height="40"> 
                                  </a>
                                @else
                                <a href="{{ route('profile.edit')  }}">
                                    <img alt="image" src="{{ asset('avatar_img/' . auth()->user()->image) }}" class="rounded-circle mr-1" width="40" height="40">
                                </a>
                                @endif
                                    
                            </div>

                            <div class="dropdown mt-2">
                                    <a class="btn-no-outline dropdown-toggle p-3 text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ auth()->user()->name }}
                                    </a> 

                                <div class="dropdown-menu shadow" x-placement="top-start">
                                    <a class="dropdown-item mt-2" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-address-card  main-color" style="font-size: 18px;"></i> <span>Profile</span> 
                                    </a>
                                    <a class="dropdown-item" href="">
                                        <form action="{{ route('logout') }}" method="POST" class="mb-0">
                                            @csrf
                                            <i class="far fa-arrow-alt-circle-down main-color" style="font-size: 18px;"></i>
                                            <button type="submit" class="btn p-0">Logout</button>
                                        </form>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

        @auth   
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-7">
                    @if(!auth()->user()->bank()->exists())
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <i class="fas fa-info-circle text-danger" style="font-size: 20px;"></i> 
                        <strong>Hello {{ auth()->user()->name }},</strong> 
                        kindly proceed to update your <a href="{{ route('profile.edit') }}" class="alert-link">bank details</a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
            </div>
        </div> 
        @endauth


        <!-- Page Content -->
        {{-- <main> --}}
            {{ $slot }}
        {{-- </main> --}}

        <hr>

        <footer class="text-center mt-4">
          <div class="">
            <p class="text-center">
            @php echo date('Y') @endphp  P48 Investment Ltd. All Rights Reserved. 
          </p>
        </footer>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

