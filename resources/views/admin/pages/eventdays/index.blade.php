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
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('web/admin/sidebar.all_eventdays') }}</span>
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
                                <th>{{ __('web/admin/eventday.eventday_date') }}</th>
                                <th>{{ __('web/admin/movie.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eventdays as $eventday)
                                <tr>
                                    <th scope="row">{{ $eventdays->firstItem() + $loop->index }}</th>
                                    <td>{{ $eventday->event_date }}</td>
                                    <td>
                                        <a href="{{ route('admin.eventdays.show', $eventday->id) }}" class="btn btn-secondary">
                                            {{ __('web/admin/movie.details') }}
                                        </a>
                                        <a href="{{ route('admin.eventdays.edit', $eventday->id) }}" class="btn btn-info">
                                            {{ __('web/admin/movie.edit') }}
                                        </a>
                                        <form class="d-inline" action="{{ route('admin.eventdays.destroy', $eventday->id) }}"
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
                {{ $eventdays->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
