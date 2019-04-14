@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.update.links')</div>
            <div class="body-card">
                @include('partitions.errors')
                <form method="post" action="{{ route('links.update', ['news' => $link]) }}" enctype="multipart/form-data" class="col-md-6 mb-2">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="title">@lang('messages.placeholder.title')</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="@lang('messages.placeholder.title')" value="{{ $link->title }}">
                    </div>
                    <div class="form-group">
                        <label for="link">@lang('messages.placeholder.link')</label>
                        <input name="link" type="text" class="form-control" id="link" placeholder="@lang('messages.placeholder.title')" value="{{ $link->link }}">
                    </div>
                    <div class="form-group">
                        <label for="description">@lang('messages.placeholder.description')</label>
                        <textarea name="description" class="form-control" id="description" placeholder="@lang('messages.placeholder.link')" cols="30" rows="10">{{ $link->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>
    </div>
@stop