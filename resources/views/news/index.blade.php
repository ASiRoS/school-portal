@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($news as $article)
                <div class="card" style="width: 18rem;">
                    <a href="{{ route('news.show', ['id' => $article->id]) }}">
                        <img class="card-img-top" src="{{ asset($article->preview_image) }}" alt="{{ $article->title }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('news.show', ['id' => $article->id]) }}">{{ $article->title }}</a></h5>
                        <p class="card-text">{{ Str::limit($article->description, 50) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $news->links() }}
    </div>
@stop