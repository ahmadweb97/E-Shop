<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>   @yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="E-Commerce Web Shop">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css" rel="stylesheet">



    {{-- Styles --}}

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    {{-- Owl Carousel --}}

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

    {{-- exzoom product image --}}
    <link rel="stylesheet" href="{{ asset('assets/exzoom/jquery.exzoom.css') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

   {{--  <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png')  }}"> --}}

    @livewireStyles
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>



    <div id="app">

        @include('layouts.layout.frontend.navbar')

        <main>
            @yield('content')
        </main>

        @include('layouts.layout.frontend.footer')


    </div>

        <!-- Scripts -->

        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>

        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <div class="whatsapp-chat">
        <a href=" https://wa.me/+96176901868?text=I'm%20interested%20in%20your%20products" target="_blank">
            <img src="{{ asset('uploads/images/walogo.png') }}" alt="whatsapp-chat" height="80px" width="80px">
        </a>
    </div>

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/63676961b0d6371309cd89b4/1gh5v799u';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->


<script>

window.addEventListener('message', event => {
    if (event.detail) {

        alertify.set('notifier','position', 'top-right');
        alertify.notify(event.detail.text, event.detail.type);
    }

});

$(document).ready(function(){
  var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('mdi-eye');
            $(this).find('i').addClass('mdi-eye-off');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('mdi-eye');
            $(this).find('i').removeClass('mdi-eye-off');
            showPass = 0;
        }

    });
});
</script>

<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>

@yield('script')

        @livewireScripts

        @stack('scripts')
</body>
</html>
