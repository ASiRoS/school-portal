@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>@lang('messages.users.name')</th>
                <th>@lang('messages.users.email')</th>
                <th>@lang('messages.users.role')</th>
                <td>@lang('messages.class')</td>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@lang('messages.roles.'.$user->role)</td>
                    @if($user->isStudent())
                        <td>{{ $user->class->name }}</td>
                    @else
                        <td>@lang('messages.empty')</td>
                    @endif
                </tr>
            @empty
                <p>@lang('messages.empty')</p>
            @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@stop