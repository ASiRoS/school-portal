@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>@lang('messages.class')</th>
                <th>@lang('messages.subject')</th>
                <th>@lang('messages.program')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($programs as $program)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $program->class_grade }}</td>
                    <td>{{ $subject->subject->title }}</td>
                    <td>{{ $subject->program }}</td>
                    @auth()
                        @if(auth()->user()->isAdmin())
                            <td><a href="{{ route('subjects.edit', ['subject' => $subject]) }}">@lang('messages.buttons.edit')</a></td>
                            <td><a href="{{ route('subjects.destroy', ['subject' => $subject]) }}">@lang('messages.buttons.delete')</a></td>
                        @endif
                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop