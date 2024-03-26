@extends('admin.includes.app')
@section('title', 'Movies')
@section('contentHeader', 'Movies')
@section('contentHeaderLink', 'Home')
@section('contentHeaderActive', 'Movies')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movies as $movie)
                                <tr>
                                    <td>{{ $movies->firstItem() + $loop->index }}</td>
                                    <td>{{ $movie->name }}</td>
                                    <td>{{ Str::limit($movie->description, 25, '...') }}</td>
                                    <td>{{ $movie->price }}</td>
                                    <td>{{ $movie->type->lang() }}</td>
                                    <td>{{ $movie->status->lang() }}</td>
                                    <td>
                                        <a href="{{ route('admin.movies.show', $movie->slug) }}"
                                            class="btn btn-secondary">
                                            Details
                                        </a>
                                        <a href="{{ route('admin.movies.edit', $movie->slug) }}" class="btn btn-info">
                                            Edit
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('admin.movies.destroy', $movie->slug) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                type="submit">Delete</button>
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
@endsection
