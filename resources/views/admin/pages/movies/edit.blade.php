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
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('web/admin/movie.create_new') }}</span>
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
                        <form action="{{ route('admin.movies.update', $movie->slug) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputNameEn1">{{ __('web/admin/movie.name_en_label') }}</label>
                                            <input type="text" value="{{ old('name_en', $movie->getTranslation('name', 'en')) }}" name="name_en"
                                                class="form-control" id="exampleInputNameEn1"
                                                placeholder="{{ __('web/admin/movie.name_en_place') }}">
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputNameAr1">{{ __('web/admin/movie.name_ar_label') }}</label>
                                            <input type="text" value="{{ old('name_ar', $movie->getTranslation('name', 'ar')) }}" name="name_ar"
                                                class="form-control" id="exampleInputNameAr1"
                                                placeholder="{{ __('web/admin/movie.name_ar_place') }}">
                                            @error('name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description_en">{{ __('web/admin/movie.description_en_label') }}</label>
                                    <textarea name="description_en" class="form-control" id="description_en" cols="30" rows="3"
                                        placeholder="{{ __('web/admin/movie.description_en_place') }}">{{ old('description_en', $movie->getTranslation('description', 'en')) }}</textarea>
                                    @error('description_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description_ar">{{ __('web/admin/movie.description_ar_label') }}</label>
                                    <textarea name="description_ar" class="form-control" id="description_ar" cols="30" rows="3"
                                        placeholder="{{ __('web/admin/movie.description_ar_place') }}">{{ old('description_ar', $movie->getTranslation('description', 'ar')) }}</textarea>
                                    @error('description_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">{{ __('web/admin/movie.price_label') }}</label>
                                    <input type="number" value="{{ old('price', $movie->price) }}" name="price" class="form-control"
                                        id="price" placeholder="{{ __('web/admin/movie.price_place') }}">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('web/admin/sidebar.showtimes') }}:</label>
                                    <div class="row">
                                        @foreach ($showtimes as $showtime)
                                            <div class="col-12">
                                                <input name="showtimes[]" type="checkbox" value="{{ $showtime->id }}"
                                                    id="{{ $showtime->id }}"
                                                    @foreach ($movie->showtimes as $show)
                                                        @if ($show->id == $showtime->id)
                                                            {{ 'checked' }}
                                                        @endif
                                                    @endforeach>
                                                <label
                                                    for="{{ $showtime->id }}">{{ $showtime->start_time . ' : ' . $showtime->end_time }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('showtimes')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="typeId1">{{ __('web/admin/movie.type_label') }}</label>
                                            <select name="type" id="typeId1" class="form-control">
                                                <option value="">{{ __('web/admin/movie.type_place') }}
                                                </option>
                                                @foreach ($types as $type)
                                                    <option {{ old('type', $movie->type->value) == $type->value ? 'selected' : '' }}
                                                        value="{{ $type->value }}">
                                                        {{ $type->lang() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('type')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputCategoryId1">{{ __('web/admin/movie.status_label') }}</label>
                                            <select name="status" id="exampleInputCategoryId1" class="form-control">
                                                <option value="">{{ __('web/admin/movie.status_place') }}
                                                </option>
                                                @foreach ($status as $stat)
                                                    <option {{ old('status', $movie->status->value) == $stat->value ? 'selected' : '' }}
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
