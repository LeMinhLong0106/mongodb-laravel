@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Authors') }}</div>

            <div class="card-body">
                <a href="{{ route('authors.create') }}" class="btn btn-primary">
                    Create New Authors
                </a>
                <div class="mt-3">
                    <h3>List Authors</h3>
                    <ul class="list-group">
                        @forelse($authors as $item)
                            <li class="list-group-item">
                                {{ $item->name }}
                                <span style="float: right;" class="d-flex">
                                    <a href="{{ route('authors.edit', [$item]) }}" style="margin-right: 1rem;"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('authors.destroy', [$item]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </span>
                            </li>
                        @empty
                            <li class="list-group-item">
                                No Auther added yest
                            </li>
                        @endforelse

                        {{-- @foreach ($authors as $item)
                            <li class="list-group-item">
                                {{ $item->name }}
                                <span style="float: right;">
                                    <a href="{{ route('authors.edit', [$item]) }}" class="btn btn-warning btn-sm">Edit</a>
                                </span>
                            </li>
                        @endforeach --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
