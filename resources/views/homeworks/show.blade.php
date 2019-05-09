@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <th>@lang('messages.subject')</th>
                <th>@lang('messages.task')</th>
                <th>@lang('messages.date')</th>
            </thead>
            <tbody>
                @foreach($homeworks as $homework)
                    <tr>
                        <td>{{ $homework->subject->title }}</td>
                        <td>{{ $homework->task }}</td>
                        <td>{{ $homework->date | date('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $homeworks->links() }}
    </div>
@stop