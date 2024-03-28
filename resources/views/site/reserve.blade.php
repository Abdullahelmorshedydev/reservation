<!DOCTYPE html>
<html lang="en" dir="{{ app()->currentLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Title -->
    <title>{{ __('web/site/attendee.title') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/nice-select.css') }}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/site/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="page-content-wrapper">
        <div class="container">
            <!-- Profile Wrapper-->
            <div class="profile-wrapper-area py-3">
                <!-- User Meta Data-->
                <div class="card user-data-card">
                    <div class="card-body">
                        <form action="{{ route('attendee.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="title mb-2"><i
                                        class="fa-solid fa-user"></i><span>{{ __('web/site/attendee.firstname_label') }}</span>
                                </div>
                                <input class="form-control" type="text" name="firstname"
                                    placeholder="{{ __('web/site/attendee.firstname_place') }}">
                                @error('firstname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i
                                        class="fa-solid fa-user"></i><span>{{ __('web/site/attendee.lastname_label') }}</span>
                                </div>
                                <input class="form-control" type="text" name="lastname"
                                    placeholder="{{ __('web/site/attendee.lastname_place') }}">
                                @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i
                                        class="fa-solid fa-phone"></i><span>{{ __('web/site/attendee.phone_label') }}</span>
                                </div>
                                <input class="form-control" type="text" name="phone"
                                    placeholder="{{ __('web/site/attendee.phone_place') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i
                                        class="fa-solid fa-envelope"></i><span>{{ __('web/site/attendee.email_label') }}</span>
                                </div>
                                <input class="form-control" type="email" name="email"
                                    placeholder="{{ __('web/site/attendee.email_place') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i
                                        class="fa-solid fa-location-arrow"></i><span>{{ __('web/site/attendee.eventday_label') }}</span>
                                </div>
                                <select name="eventday_id" id="" class="form-control">
                                    <option value="">{{ __('web/site/attendee.eventday_place') }}</option>
                                    @foreach ($eventdays as $eventday)
                                        <option value="{{ $eventday->id }}">{{ $eventday->event_date }}</option>
                                    @endforeach
                                </select>
                                @error('eventday_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i
                                        class="fa-solid fa-location-arrow"></i><span>{{ __('web/site/attendee.movie_label') }}</span>
                                </div>
                                <select name="movie_id" id="" class="form-control">
                                    <option value="">{{ __('web/site/attendee.movie_place') }}</option>
                                </select>
                                @error('movie_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i
                                        class="fa-solid fa-location-arrow"></i><span>{{ __('web/site/attendee.showtime_label') }}</span>
                                </div>
                                <select name="showtime_id" id="" class="form-control">
                                    <option value="">{{ __('web/site/attendee.showtime_place') }}</option>
                                </select>
                                @error('showtime_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-success w-100"
                                type="submit">{{ __('web/site/attendee.submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="{{ asset('assets/site/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.passwordstrength.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/theme-switching.js') }}"></script>
    <script src="{{ asset('assets/site/js/active.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}")
        </script>
    @endif
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('select[name="eventday_id"]').on('change', function() {
                var eventday_id = $(this).val();
                var lang = "{{ LaravelLocalization::getCurrentLocale() }}";

                if (eventday_id) {
                    $.ajax({
                        url: "{{ route('movies') }}/" + eventday_id,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            html = '<option value=""></option>';
                            $.each(response.data, function(index, value) {
                                html +=
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name[lang] +
                                    '</option>';
                            });
                            $('select[name="movie_id"]').empty('').append(html);
                        },
                        error: function(xhr, status, error) {
                            console.log("feh error ya morshed");
                        }
                    });
                } else {
                    console.log('Please select a Eventday');
                }
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('select[name="movie_id"]').on('change', function() {
                var movie_id = $(this).val();
                var lang = "{{ LaravelLocalization::getCurrentLocale() }}";

                if (movie_id) {
                    $.ajax({
                        url: "{{ route('showtimes') }}/" + movie_id,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            html = '<option value=""></option>';
                            $.each(response.data, function(index, value) {
                                html +=
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.start_time +
                                    ' : ' +
                                    value.end_time
                                    '</option>';
                            });
                            $('select[name="showtime_id"]').empty('').append(html);
                        },
                        error: function(xhr, status, error) {
                            console.log("feh error ya morshed");
                        }
                    });
                } else {
                    console.log('Please select a Movie');
                }
            });
        });
    </script>
</body>

</html>
