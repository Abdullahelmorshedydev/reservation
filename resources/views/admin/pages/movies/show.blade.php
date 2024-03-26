@extends('admin.layouts.app')

@push('style')
@endpush

@section('title', __('web/admin/movie.movies'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('web/admin/movie.movies') }}</h4>
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
                                <h5 class="card-title">{{ $movie->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    {{ $movie->price }}
                                </h6>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    {{ $movie->description }}
                                </h6>
                                <p class="card-text">{{ $movie->type->lang() }}</p>
                                <p class="card-text">{{ $movie->status->lang() }}</p>
                                <a href="{{ route('admin.movies.edit', $movie->slug) }}"
                                    class="card-link text-secondary">{{ __('web/admin/movie.edit') }}</a>
                                <form class="d-inline" action="{{ route('admin.movies.destroy', $movie->slug) }}"
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
