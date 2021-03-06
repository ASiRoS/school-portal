@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.create.program')</div>
            <div class="body-card">
                @include('partitions.errors')
                <form method="post" action="{{ route('programs.edit') }}" enctype="multipart/form-data" class="col-md-6 mb-2">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="program">@lang('messages.program')</label>
                        <input name="program" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subject">@lang('messages.subject')</label>
                        <select name="subject" class="form-control" id="subject">
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" @if($program->subject_id == $subject->id) selected @endif>{{ $subject->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">@lang('messages.class')</label>
                        <select name="class" class="form-control" id="class">
                            @foreach($grades as $grade)
                                <option value="{{ $grade }}" @if($program->grade == $grade) selected @endif>{{ $grade }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>
    </div>
@stop