@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Предмет</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td><a href="{{ route('programs.show', ['subject' => $subject]) }}">{{ $subject->title }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop