@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Предмет</th>
                <th>Классы</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $subject->title }}</td>
                    <td>{{ $subject->grades }}</td>
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