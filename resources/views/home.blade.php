@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="card">
                <div class="card-header">@lang('messages.school.news')</div>
                <div class="card-body">
                    <div class="row">
                        @forelse($news as $article)
                            <div class="card" style="width: 18rem;">
                                <a href="{{ route('news.show', ['id' => $article->id]) }}">
                                    <img class="card-img-top" src="{{ asset($article->preview_image) }}" alt="{{ $article->title }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('news.show', ['id' => $article->id]) }}">{{ $article->title }}</a></h5>
                                    <p class="card-text">{{ Str::limit($article->description, 50) }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="m-auto">@lang('messages.empty')</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">@lang('messages.partners')</div>
                <div class="card-body">
                    <div class="row">
                        @forelse($partners as $partner)
                            <div class="card" style="width: 18rem;">
                                <a href="{{ $partner->link }}">
                                    <img class="card-img-top" src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}">
                                </a>
                                <div class="card-body">
                                    <p>{{ $partner->name }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="m-auto">@lang('messages.empty')</p>
                        @endforelse
                    </div>
                </div>
            </div>
    </div>
@endsection
