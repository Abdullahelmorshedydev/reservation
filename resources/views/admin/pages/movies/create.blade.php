@extends('admin.includes.app')
@section('title', 'Movies')
@section('contentHeader', 'Movies')
@section('contentHeaderLink', 'Home')
@section('contentHeaderActive', 'Create New')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <form action="{{ route('admin.movies.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        id="exampleInputEmail1" placeholder="Enter Movie Name">
                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" value="{{ old('price') }}" class="form-control"
                                        id="price" placeholder="Enter Movie Price">
                                    @error('price')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="3"
                                placeholder="Enter Movie Description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputStatus1">Status</label>
                                    <select name="status" id="exampleInputStatus1" class="form-control">
                                        <option disabled selected>Choose Movie Status</option>
                                        @foreach ($status as $stat)
                                            <option {{ old('status') == $stat->value ? 'selected' : '' }}
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="movieType">Type</label>
                                    <select name="type" id="movieType" class="form-control">
                                        <option disabled selected>Choose Movie Type</option>
                                        @foreach ($types as $type)
                                            <option {{ old('status') == $type->value ? 'selected' : '' }}
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
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
