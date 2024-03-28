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
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('web/admin/movie.details') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!--div-->
    <div class="col-xl-12">
        <div class="row">
            <div class="col-12  col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="card-title">{{ $eventday->name }}</h5>
                                <p class="card-text">{{ __('web/admin/sidebar.movies') }}</p>
                                @foreach ($eventday->movies as $movie)
                                    <p class="card-text">{{ $movie->name }}</p>
                                @endforeach
                                <a href="{{ route('admin.eventdays.edit', $eventday->id) }}"
                                    class="card-link text-secondary">{{ __('web/admin/movie.edit') }}</a>
                                <form class="d-inline" action="{{ route('admin.eventdays.destroy', $eventday->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        type="submit">{{ __('web/admin/movie.delete') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
