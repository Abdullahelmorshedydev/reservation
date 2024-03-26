<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @include('admin.includes.style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.includes.preload')

        @include('admin.includes.navbar')

        @include('admin.includes.sidebar')

        @include('admin.includes.content')

        @include('admin.includes.footer')
    </div>
    <!-- ./wrapper -->

    @include('admin.includes.script')
</body>

</html>
