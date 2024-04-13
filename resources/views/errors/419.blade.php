<x-error-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center mb-5">
                <h1 class="display-2 fw-medium">Session Expired</h1>
                <h4 class="text-uppercase">Your session timed out. To continue your transaction, please sign in again.</h4>
                <div class="mt-5 text-center">
                    <a class="btn btn-primary waves-effect waves-light"  href="{{ route('register') }}">Sign in</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-xl-6">
            <div>
                <img src="{{ asset('error-img.png') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</x-error-layout>

{{-- <!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>{{ config('app.name') }} - Page Expired</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('home/assets/images/logo/favicon.png') }}co">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/libs/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <div class="account-pages my-5 pt-5">
            <div class="container">

            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>
    

        <script src="{{ asset('assets/js/app.js')}}"></script>

    </body>
</html> --}}
