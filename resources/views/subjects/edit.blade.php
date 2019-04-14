@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.edit.subjects')</div>
            <div class="body-card">
                @include('partitions.errors')
                <form method="post" action="{{ route('subjects.update', ['subject' => $subject]) }}" enctype="multipart/form-data" class="col-md-6 mb-2">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">@lang('messages.subject')</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{ $subject->title }}">
                    </div>
                    <div class="form-group">
                        <label for="class_grades">@lang('messages.for.classes')</label>
                        <input name="class_grades" type="text" class="form-control" id="class_grades" value="{{ $subject->grades }}">
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>
    </div>
@stop