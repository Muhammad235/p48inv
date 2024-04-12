<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

  <title>General Dashboard  {{ config('app.name', 'P48InvestmentLtd') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

<!-- Start GA -->


</head>

    <!--=============================
        DISPLAY ANY ERROR START
    ==============================-->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        @php
        //  toastr()->error("$error")
        //  toastr.error("$error")
        @endphp
        @endforeach
    @endif
    <!--=============================
       DISPLAY ANY ERROR END
    ==============================--> 