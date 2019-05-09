@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.create.homeworks')</div>
            <div class="body-card">
                @include('partitions.errors')
                <form method="post" action="{{ route('homeworks.update', ['homework' => $homework]) }}" class="col-md-8 mb-2">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="task">@lang('messages.placeholder.title')</label>
                        <input name="task" type="text" class="form-control" id="task" placeholder="@lang('messages.placeholder.task')" value="{{ $homework->task }}">
                    </div>
                    <div class="form-group">
                        <label for="subject">@lang('messages.subject')</label>
                        <select name="subject_id" class="form-control" id="subject">
                            <option>@lang('messages.subject')</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" @if($subject->id == $homework->subject_id) selected @endif>{{ $subject->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">@lang('messages.class')</label>
                        <select name="class_id" class="form-control" id="class">
                            <option>@lang('messages.class')</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" @if($class->id == $homework->class_id) selected @endif>{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>
    </div>
@stop