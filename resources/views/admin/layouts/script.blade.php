<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<!-- JQuery min js -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Bundle js -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!--Internal  Chart.bundle js -->
<script src="{{ asset('assets/admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>

<!-- Ionicons js -->
<script src="{{ asset('assets/admin/plugins/ionicons/ionicons.js') }}"></script>

<!-- Moment js -->
<script src="{{ asset('assets/admin/plugins/moment/moment.js') }}"></script>

<!--Internal Sparkline js -->
<script src="{{ asset('assets/admin/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Moment js -->
<script src="{{ asset('assets/admin/plugins/raphael/raphael.min.js') }}"></script>

<!--Internal  Flot js-->
<script src="{{ asset('assets/admin/plugins/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/admin/js/dashboard.sampledata.js') }}"></script>
<script src="{{ asset('assets/admin/js/chart.flot.sampledata.js') }}"></script>

<!-- Custom Scroll bar Js-->
<script src="{{ asset('assets/admin/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!-- Rating js-->
<script src="{{ asset('assets/admin/plugins/rating/jquery.rating-stars.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/rating/jquery.barrating.js') }}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{ asset('assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

<!-- Eva-icons js -->
<script src="{{ asset('assets/admin/js/eva-icons.min.js') }}"></script>

<!-- right-sidebar js -->
<script src="{{ asset('assets/admin/plugins/sidebar/sidebar.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/sidebar/sidebar-custom.js') }}"></script>

<!-- Sticky js -->
<script src="{{ asset('assets/admin/js/sticky.js') }}"></script>
<script src="{{ asset('assets/admin/js/modal-popup.js') }}"></script>

<!-- Left-menu js-->
<script src="{{ asset('assets/admin/plugins/side-menu/sidemenu.js') }}"></script>

<!--Internal  index js -->
<script src="{{ asset('assets/admin/js/index.js') }}"></script>

<!-- custom js -->
<script src="{{ asset('assets/admin/js/custom.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}")
    </script>
@endif
@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}")
    </script>
@endif

@stack('script')
