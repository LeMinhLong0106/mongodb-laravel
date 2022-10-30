@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Books') }}</div>

            <div class="card-body">
                <a href="{{ route('books.create') }}" class="btn btn-primary">
                    Create New Book
                </a>
                <div class="mt-3">
                    <h3>List books</h3>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Pages</th>
                            <th>Author name</th>
                            <th>Action</th>
                        </tr>
                        @forelse($books as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ asset($item->image) }}" width="50" height="50" alt=""></td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->pages }}</td>
                                <td>{{ optional($item->author)->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('books.edit', [$item]) }}" style="margin-right: 1rem;"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('books.destroy', [$item]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center"> No Book added yet</td>
                            </tr>
                        @endforelse
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
