@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.edit.news')</div>
            <div class="body-card">
                @include('partitions.errors')
                <form method="post" action="{{ route('news.update', ['news' => $article]) }}" enctype="multipart/form-data" class="col-md-6 mb-2">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="title">@lang('messages.placeholder.title')</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="@lang('messages.placeholder.title')" value="{{ $article->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description">@lang('messages.placeholder.description')</label>
                        <textarea name="description" class="form-control" id="description" placeholder="@lang('messages.placeholder.description')" cols="30" rows="10">{{ $article->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">@lang('messages.placeholder.image')</label>
                        <input name="preview_image" type="file" class="form-control-file" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>
    </div>
@stop