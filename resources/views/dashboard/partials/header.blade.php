<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Laravel Core Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{asset('img/dashboard/favicon.ico')}}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('plugins/dashboard/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{asset('plugins/dashboard/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{asset('css/dashboard/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{asset('css/dashboard/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" /> --}}
    <!--end::Global Stylesheets Bundle-->
    <!-- Toastr Awesome -->
    <link rel="stylesheet" href="{{asset('css/dashboard/toastr.min.css')}}">
</head>
