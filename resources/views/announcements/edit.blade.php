@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.create.announcements')</div>
            <div class="body-card">
                @include('partitions.errors')
                <form method="post" action="{{ route('announcements.update', ['announcement' => $announcement]) }}" enctype="multipart/form-data" class="col-md-6 mb-2">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">@lang('messages.placeholder.title')</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="@lang('messages.placeholder.title')" value="{{ $announcement->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description">@lang('messages.placeholder.description')</label>
                        <textarea name="description" class="form-control" id="description" placeholder="@lang('messages.placeholder.description')" cols="30" rows="10">{{ $announcement->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>
    </div>
@stop