@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang('messages.create.users')</div>
            <div class="body-card">
                @include('partitions.errors')
                <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data" class="col-md-6 mb-2">
                    @csrf
                    <div class="form-group">
                        <label for="name">@lang('messages.users.name')</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">@lang('messages.users.email')</label>
                        <input name="email" type="text" class="form-control" id="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">@lang('messages.users.password')</label>
                        <input name="password" type="password" class="form-control" id="password" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label for="role">@lang('messages.users.role')</label>
                        <select name="role" class="form-control" id="role">
                            @foreach($roles as $role)
                                <option value="{{ $role }}" @if($role == old('role')) selected @endif>@lang('messages.roles.'.$role)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="role-group">
                        <label for="class">@lang('messages.class')</label>
                        <select name="class_id" class="form-control" id="class">
                            <option>@lang('messages.class')</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" @if($class->id == old('class_id')) selected @endif>{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('messages.button.send')</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(function () {
            $('#role').change(function () {
                showClasses();
            });

            showClasses();

            function showClasses() {
                var role = $('#role').val();
                var roleGroup = $('#role-group');

                if(role === 'student') {
                    roleGroup.removeClass('d-none');
                } else {
                    if(!roleGroup.hasClass('d-none')) {
                        roleGroup.addClass('d-none');
                    }
                }
            }
        });
    </script>
@stop
