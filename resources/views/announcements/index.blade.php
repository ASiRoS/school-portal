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
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $announcements->links() }}
    </div>
@stop