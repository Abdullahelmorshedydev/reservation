@extends('admin.includes.app')
@section('title', 'Movies')
@section('contentHeader', 'Movies')
@section('contentHeaderLink', 'Home')
@section('contentHeaderActive', 'Movie Details')
@section('content')
    <div class="row">
        <div class="col-12 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    {{ $movie->name }}
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead">{{ $movie->price }}</h2>
                            <p class="text-muted text-sm">
                                {{ $movie->description }}
                            </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small">
                                    {{ $movie->type->lang() }}
                                </li>
                                <li class="small">
                                    {{ $movie->status->lang() }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="{{ route('admin.movies.edit', $movie->slug) }}" class="btn btn-sm bg-info">
                            Edit
                        </a>
                        <form class="d-inline" action="{{ route('admin.movies.destroy', $movie->slug) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
