@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>@lang('messages.placeholder.title')</th>
                    <th>@lang('messages.placeholder.description')</th>
                </tr>
            </thead>
            <tbody>
            @foreach($links as $link)
                <tr>
                    <td>{{ $link->id }}</td>
                    <td><a href="{{ $link->link }}">{{ $link->title }}</a></td>
                    <td>{{ $link->description }}</td>
                    @auth()
                        @if(auth()->user()->isAdmin())
                            <td><a href="{{ route('links.edit', ['link' => $link]) }}">@lang('messages.buttons.edit')</a></td>
                            <td><a href="{{ route('links.destroy', ['link' => $link]) }}">@lang('messages.buttons.delete')</a></td>
                        @endif
                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop