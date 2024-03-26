<!-- Icons css -->
<link href="{{ asset('assets/admin/css/icons.css') }}" rel="stylesheet">

<!--  Owl-carousel css-->
<link href="{{ asset('assets/admin/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />

<!--  Custom Scroll bar-->
<link href="{{ asset('assets/admin/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

<!--  Right-sidemenu css -->
<link href="{{ asset('assets/admin/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

<!-- Maps css -->
<link href="{{ asset('assets/admin/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

@if (app()->getLocale() == 'ar')
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css-rtl/sidemenu.css') }}">

    <!--- Internal Morris css-->
    <link href="{{ asset('assets/admin/plugins/morris.js/morris.css') }}" rel="stylesheet">

    <!--- Style css --->
    <link href="{{ asset('assets/admin/css-rtl/style.css') }}" rel="stylesheet">

    <!--- Dark-mode css --->
    <link href="{{ asset('assets/admin/css-rtl/style-dark.css') }}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ asset('assets/admin/css-rtl/skin-modes.css') }}" rel="stylesheet" />
@else
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/sidemenu.css') }}">

    <!-- style css -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style-dark.css') }}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ asset('assets/admin/css/skin-modes.css') }}" rel="stylesheet" />
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

@stack('style')
