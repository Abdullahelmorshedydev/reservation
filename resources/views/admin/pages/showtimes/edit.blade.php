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
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('web/admin/showtime.update_showtime') }}</span>
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
                        <form action="{{ route('admin.showtimes.update', $showtime->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="form-group">
                                    <label for="start_time">{{ __('web/admin/showtime.start_time') }}</label>
                                    <input type="time" value="{{ old('start_time', $showtime->start_time) }}" name="start_time"
                                        class="form-control" id="start_time">
                                    @error('start_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="end_time">{{ __('web/admin/showtime.end_time') }}</label>
                                    <input type="time" value="{{ old('end_time', $showtime->end_time) }}" name="end_time" class="form-control"
                                        id="end_time">
                                    @error('end_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCategoryId1">{{ __('web/admin/movie.status_label') }}</label>
                                    <select name="status" id="exampleInputCategoryId1" class="form-control">
                                        <option value="">{{ __('web/admin/movie.status_place') }}
                                        </option>
                                        @foreach ($status as $stat)
                                            <option {{ old('status', $showtime->status->value) == $stat->value ? 'selected' : '' }}
                                                value="{{ $stat->value }}">
                                                {{ $stat->lang() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
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
@endpush
