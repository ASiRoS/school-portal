@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Объявление</th>
                    <th>Описание</th>
                </tr>
            </thead>
            <tbody>
                @foreach($announcements as $announcement)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $announcement->title }}</td>
                        <td>{{ $announcement->description }}</td>
                        @auth()
                            @if(auth()->user()->isAdmin())
                                <td><a href="{{ route('announcements.edit', ['announcement' => $announcement]) }}">@lang('messages.buttons.edit')</a></td>
                                <td><a href="{{ route('announcements.destroy', ['announcement' => $announcement]) }}">@lang('messages.buttons.delete')</a></td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $announcements->links() }}
    </div>
@stop