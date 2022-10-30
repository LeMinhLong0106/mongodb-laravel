@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Edit Book') }}</div>

            <div class="card-body">
                <form action="{{ route('books.update', [$book]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $book->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" value="{{ $book->price }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pages">Pages</label>
                        <input type="text" name="pages" value="{{ $book->pages }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="author_id">Author</label>
                        <select name="author_id" id="author_id" class="form-control">
                            @forelse ($authors as $item)
                                <option value="{{ $item->id }}" @if ($book->author->id == $item->id) selected @endif>
                                    {{ $item->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <button class="btn btn-primary mt-2">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
