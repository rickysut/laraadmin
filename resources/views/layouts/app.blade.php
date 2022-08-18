<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <!-- Call App Mode on ios devices -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no">
	<!-- base css -->
	
	<link href="{{ asset('css/smartadmin/vendors.bundle.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/smartadmin/app.bundle.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/smartadmin/skin-master.css') }}" rel="stylesheet" />
	<!-- fav icon -->
	<link href="{{ asset('img/logo-icon.png') }}" rel="icon" />
	<link href="{{ asset('img/logo-icon.png') }}" rel="apple-touch-icon" sizes="180x180" />
	<link href="{{ asset('img/logo-icon.png') }}" rel="safari-pinned-tab.svg" color="#5bbad5" />
	<!-- page related css -->
	<link href="{{ asset('css/smartadmin/fa-brands.css') }}" rel="stylesheet" />
    @yield('styles')
    
</head>

<body>
    <div class="page-wrapper">
       <div class="page-inner bg-brand-gradient">
           <div class="page-content-wrapper bg-transparent m-0">
               <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                   <div class="d-flex align-items-center container p-0">
                       <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                           <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                               <img src="{{ asset('img/logo-icon.png') }}" alt="{{ trans('panel.site_title') }}" aria-roledescription="logo">
                               <span class="page-logo-text mr-1">{{ trans('panel.site_title') }}</span>
                           </a>
                       </div>
                       
                       
                       <a class="dropdown c-header-nav ml-auto">
                           @if(count(config('panel.available_languages', [])) > 1)
                           <a class="c-header-nav-item dropdown d-md-down-none">
                   
                             <a class="text-white c-header-nav-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" href="#"  aria-haspopup="true" aria-expanded="true">
                               {{ strtoupper(app()->getLocale()) }}
                             </a>
                             <div class="dropdown-menu dropdown-menu-right">
                               @foreach(config('panel.available_languages') as $langLocale => $langName)
                               <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                               @endforeach
                             </div>
                           </a>
                           @endif
                   
                   
                       </a>
                   </div>
               </div>
               <div class="flex-1" style="background: url('{{ asset('img/pattern-1.svg') }}') no-repeat center bottom fixed; background-size: cover;">
                   @yield("content")
               </div>
               <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                   2022 © {{ trans('panel.site_title') }} by&nbsp;<a href='#' class='text-white opacity-60 fw-500' title='{{ trans('panel.site_title') }}' target='_blank'>TIM Creative</a>
               </div>
           </div>
       </div>
   </div>
   <script src="{{ asset('js/vendors.bundle.js') }}"></script>
   <script src="{{ asset('js/app.bundle.js') }}"></script>
   @yield('scripts')
</body>
</html>