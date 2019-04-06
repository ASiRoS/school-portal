@foreach($news as $article)
    <p>{{ $article->title }}</p>
    <img src="{{ $article->preview_image }}" alt="{{ $article->title }}">
    <p>{{ Str::limit($article->description, 50) }}</p>
@endforeach