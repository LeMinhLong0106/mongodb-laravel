@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Create New Author') }}</div>

            <div class="card-body">
                <form action="{{ route('authors.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <button class="btn btn-primary mt-2">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
