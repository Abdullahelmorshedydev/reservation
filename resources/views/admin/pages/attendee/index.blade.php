@extends('admin.layouts.app')

@push('style')
@endpush

@section('title', __('web/admin/attendee.attendees'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('web/admin/attendee.attendees') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('web/admin/attendee.all_attendees') }}</span>
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
                                <th>{{ __('web/admin/attendee.name') }}</th>
                                <th>{{ __('web/admin/attendee.email') }}</th>
                                <th>{{ __('web/admin/attendee.phone') }}</th>
                                <th>{{ __('web/admin/attendee.eventday') }}</th>
                                <th>{{ __('web/admin/attendee.movie') }}</th>
                                <th>{{ __('web/admin/attendee.showtime') }}</th>
                                <th>{{ __('web/admin/movie.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendees as $attendee)
                                <tr>
                                    <th scope="row">{{ $attendees->firstItem() + $loop->index }}</th>
                                    <td>{{ $attendee->name }}</td>
                                    <td>{{ $attendee->email }}</td>
                                    <td>{{ $attendee->phone }}</td>
                                    <td>{{ $attendee->eventday->event_date }}</td>
                                    <td>{{ $attendee->movie->name }}</td>
                                    <td>{{ $attendee->showtime->start_time }}</td>
                                    <td>
                                        <form class="d-inline" action="{{ route('admin.attendees.destroy', $attendee->id) }}"
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
                {{ $attendees->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
