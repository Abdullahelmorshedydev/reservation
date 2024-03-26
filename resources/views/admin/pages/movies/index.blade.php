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
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('web/admin/sidebar.all_movies') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('web/admin/movie.name') }}</th>
                                <th>{{ __('web/admin/movie.description') }}</th>
                                <th>{{ __('web/admin/movie.price_label') }}</th>
                                <th>{{ __('web/admin/movie.type_label') }}</th>
                                <th>{{ __('web/admin/movie.status_label') }}</th>
                                <th>{{ __('web/admin/movie.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movies as $movie)
                                <tr>
                                    <th scope="row">{{ $movies->firstItem() + $loop->index }}</th>
                                    <th>{{ $movie->name }}</th>
                                    <th>{{ Str::limit($movie->description, 25, '...') }}</th>
                                    <td>{{ $movie->price }}</td>
                                    <td>{{ $movie->type->lang() }}</td>
                                    <td>{{ $movie->status->lang() }}</td>
                                    <td>
                                        <a href="{{ route('admin.movies.show', $movie->slug) }}" class="btn btn-secondary">
                                            {{ __('web/admin/movie.details') }}
                                        </a>
                                        <a href="{{ route('admin.movies.edit', $movie->slug) }}" class="btn btn-info">
                                            {{ __('web/admin/movie.edit') }}
                                        </a>
                                        <form class="d-inline" action="{{ route('admin.movies.destroy', $movie->slug) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                type="submit">{{ __('web/admin/movie.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $movies->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
