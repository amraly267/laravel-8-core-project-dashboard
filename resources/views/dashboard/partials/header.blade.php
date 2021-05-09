<meta charset="utf-8" />
<title>{{$title}}</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="shortcut icon" href="{{$logo}}" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
@if(config('app.locale') == 'ar')
<link href="{{asset('plugins/dashboard/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/dashboard/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
@else
<link href="{{asset('plugins/dashboard/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/dashboard/style.bundle.css')}}" rel="stylesheet" type="text/css" />
@endif
<!--end::Global Stylesheets Bundle-->
