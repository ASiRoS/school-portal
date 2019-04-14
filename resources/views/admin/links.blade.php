@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">@lang('messages.manage')</div>
                <div class="card-body">
                    <ul class="navbar">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">@lang('messages.index.users')</a>
                            <a href="{{ route('users.create') }}" class="nav-link">@lang('messages.create.users')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('news.index') }}" class="nav-link">@lang('messages.index.news')</a>
                            <a href="{{ route('news.create') }}" class="nav-link">@lang('messages.create.news')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('announcements.index') }}" class="nav-link">@lang('messages.index.announcements')</a>
                            <a href="{{ route('announcements.create') }}" class="nav-link">@lang('messages.create.announcements')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('books.index') }}" class="nav-link">@lang('messages.index.books')</a>
                            <a href="{{ route('books.create') }}" class="nav-link">@lang('messages.create.books')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('partners.index') }}" class="nav-link">@lang('messages.partners')</a>
                            <a href="{{ route('partners.create') }}" class="nav-link">@lang('messages.create.partner')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subjects.index') }}" class="nav-link">@lang('messages.subject')</a>
                            <a href="{{ route('subjects.create') }}" class="nav-link">@lang('messages.create.subjects')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('programs.index') }}" class="nav-link">@lang('messages.program')</a>
                            <a href="{{ route('programs.create') }}" class="nav-link">@lang('messages.create.program')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('links.index') }}" class="nav-link">@lang('messages.links')</a>
                            <a href="{{ route('links.create') }}" class="nav-link">@lang('messages.create.links')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subjects.index') }}" class="nav-link">@lang('messages.index.subjects')</a>
                            <a href="{{ route('subjects.create') }}" class="nav-link">@lang('messages.create.subjects')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop