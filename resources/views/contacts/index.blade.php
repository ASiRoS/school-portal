@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">@lang('messages.contacts')</div>

                    <div class="card-body">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">@lang('messages.feedback')</div>
                                <div role="form" class="wpcf7" id="wpcf7-f96-p51-o1" lang="ru-RU" dir="ltr">
                                    <form action="{{ route('contacts.store') }}" method="post">
                                        @csrf
                                        <div class="card-body">
                                            @include('partitions.errors')
                                            <div class="form-group">
                                                <label for="name">@lang('messages.label.name')</label>
                                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">@lang('messages.label.phone')</label>
                                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">@lang('messages.label.email')</label>
                                                <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="message">@lang('messages.label.message')</label>
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="10">{{ old('message') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary">@lang('messages.button.send')</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop