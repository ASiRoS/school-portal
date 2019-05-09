@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.partners')</div>
            <div class="row">
                @foreach($partners as $partner)
                    <div class="card-body">
                        <div class="card-title">
                            <a href="{{ $partner->link }}"><img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop