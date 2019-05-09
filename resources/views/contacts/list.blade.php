@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>@lang('messages.label.name')</th>
                <th>@lang('messages.label.phone')</th>
                <th>@lang('messages.label.email')</th>
                <th>@lang('messages.label.message')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->message }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop