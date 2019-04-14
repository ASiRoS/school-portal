@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.create.books')</div>
            <div class="body-card">
                @include('partitions.errors')
                <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data" class="col-md-6 mb-2">
                    @csrf
                    <div class="form-group">
                        <label for="name">@lang('messages.placeholder.title')</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="@lang('messages.placeholder.title')" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="book">@lang('messages.book')</label>
                        <input name="book" type="file" class="form-control-file" id="book">
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>
    </div>
@stop