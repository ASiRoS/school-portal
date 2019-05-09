@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.create.schedule')</div>
            <div class="body-card">
                @include('partitions.errors')
                <form method="post" action="{{ route('schedules.store') }}" class="col-md-6 mb-2">
                    @csrf

                    <div class="form-group">
                        <label for="subjects">@lang('messages.subject')</label>
                        <select name="subjects[]" class="form-control" id="subjects" multiple>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" @if(old('subject_id') == $subject->id) selected @endif>{{ $subject->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="days">@lang('messages.day')</label>
                        <select name="day" class="form-control" id="days">
                            @foreach($days as $day)
                                <option value="{{ $day->getValue() }}">{{ $day->getTitle() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="class">@lang('messages.class')</label>
                        <select name="class_id" class="form-control" id="class">
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" @if(old('class') == $class->id) selected @endif>{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        #subjects { height: 605px; }
    </style>
@stop