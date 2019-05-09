@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.create.partner')</div>
            <div class="body-card">
                @include('partitions.errors')
                <form method="post" action="{{ route('partners.store') }}" enctype="multipart/form-data" class="col-md-6 mb-2">
                    @csrf
                    <div class="form-group">
                        <label for="title">@lang('messages.placeholder.title')</label>
                        <input name="name" type="text" class="form-control" id="title" placeholder="@lang('messages.placeholder.title')" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="link">@lang('messages.placeholder.link')</label>
                        <input name="link" type="text" class="form-control" id="link" placeholder="@lang('messages.placeholder.link')" value="{{ old('link') }}">
                    </div>
                    <div class="form-group">
                        <label for="image">@lang('messages.placeholder.image')</label>
                        <input name="logo" type="file" class="form-control-file" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>
    </div>
@stop