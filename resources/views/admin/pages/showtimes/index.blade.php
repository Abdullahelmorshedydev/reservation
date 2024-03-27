@extends('admin.layouts.app')

@push('style')
@endpush

@section('title', __('web/admin/showtime.showtimes'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('web/admin/showtime.showtimes') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('web/admin/sidebar.all_showtimes') }}</span>
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
                                <th>{{ __('web/admin/showtime.end_time') }}</th>
                                <th>{{ __('web/admin/showtime.start_time') }}</th>
                                <th>{{ __('web/admin/movie.status_label') }}</th>
                                <th>{{ __('web/admin/movie.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($showtimes as $showtime)
                                <tr>
                                    <th scope="row">{{ $showtimes->firstItem() + $loop->index }}</th>
                                    <td>{{ $showtime->start_time }}</td>
                                    <td>{{ $showtime->end_time }}</td>
                                    <td>{{ $showtime->status->lang() }}</td>
                                    <td>
                                        <a href="{{ route('admin.showtimes.edit', $showtime->id) }}" class="btn btn-info">
                                            {{ __('web/admin/movie.edit') }}
                                        </a>
                                        <form class="d-inline" action="{{ route('admin.showtimes.destroy', $showtime->id) }}"
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
                {{ $showtimes->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
