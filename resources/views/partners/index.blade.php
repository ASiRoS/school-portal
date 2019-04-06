@foreach($partners as $partner)
    <a href="{{ $partner->link }}"><img src="{{ $partner->logo }}" alt="{{ $partner->name }}"></a>
@endforeach