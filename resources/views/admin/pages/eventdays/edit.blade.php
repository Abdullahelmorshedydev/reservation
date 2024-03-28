@extends('admin.layouts.app')

@push('style')
@endpush

@section('title', __('web/admin/eventday.eventdays'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('web/admin/eventday.eventdays') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('web/admin/eventday.update_eventday') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.eventdays.update', $eventday->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="form-group">
                                    <label for="event_date">{{ __('web/admin/eventday.eventday_date') }}</label>
                                    <input type="date" value="{{ old('event_date', $eventday->event_date) }}" name="event_date"
                                        class="form-control" id="event_date">
                                    @error('event_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <p class="mg-b-10">{{ __('web/admin/movie.movies') }}</p>
                                    <div id="movies">
                                        @foreach ($eventday->movies as $movie)
                                            <div class="movie mt-2">
                                                <select name="movies[{{ $loop->index }}]" class="form-control">
                                                    @foreach ($movies as $mov)
                                                        <option value="{{ $mov->id }}"
                                                            {{ $movie->id == $mov->id ? 'selected' : '' }}>
                                                            {{ $mov->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="button" class="btn btn-primary"
                                        id="add-movie">{{ __('web/admin/eventday.add_movie') }}</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('web/admin/movie.update') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.getElementById('add-movie').addEventListener('click', function() {
            var movieDiv = document.getElementById('movies');
            var movieCount = document.getElementsByClassName('movie').length;

            var newMovieDiv = document.createElement('div');

            newMovieDiv.classList.add('movie');
            newMovieDiv.classList.add('mt-2');

            newMovieDiv.innerHTML = `
            <select name="movies[${movieCount}]" class="form-control">
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                @endforeach
            </select>
        `;

            movieDiv.appendChild(newMovieDiv);
        });
    </script>
@endpush
