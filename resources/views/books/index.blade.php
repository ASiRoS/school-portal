@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Книга</th>
                <th>Описание</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $book->name }}</td>
                    @if($book->is_ebook)
                        <td><a href="{{ asset($book->file) }}">Скачать</a></td>
                    @else
                        <td>В библиотеке</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    </div>
@stop