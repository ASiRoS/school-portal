@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $article->title }}</div>
            <div class="card-body">{{ $article->description }}</div>
        </div>

        <div class="card">
            <div class="card-header">Оставить комментарий:</div>
            <div class="card-body">
                <form action="{{ route('news.comment', ['article' => $article]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea name="text" class="form-control" cols="30" rows="10" placeholder="Комментарий"></textarea>
                    </div>
                    <button class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Комментарии:</div>
            <div class="card-body">
                @foreach($comments as $comment)
                    <div class="card">
                        <div class="card-header">@lang('messages.author'): {{ $comment->author->name }}</div>
                        <div class="card-body">{{ $comment->text }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop