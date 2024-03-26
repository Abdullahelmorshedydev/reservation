<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

@include('admin.layouts.head')

<body class="main-body app sidebar-mini">

    <!-- Page -->
    <div class="page">

        @include('admin.layouts.sidebar')

        @include('admin.layouts.content')

        @include('admin.layouts.footer')

    </div>
    <!-- End Page -->

    @include('admin.layouts.script')

</body>

</html>
