@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('schedules.index') }}" method="get" id="class_form">
            <div class="form-group">
                <label for="class">@lang('messages.class')</label>
                <select name="class_id" class="form-control" id="class">
                    <option>@lang('messages.choose_class')</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}" @if($class->id == $classId) selected @endif>{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        @forelse($schedules as $schedule)
            <p>Расписание для {{ $schedule->class->name }} на {{ $schedule->day }}</p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Предмет</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedule->getSubjects() as $subject)
                        <tr>
                            <td>{{ $subject->title }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @empty
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Предмет</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Расписаний нет.</td>
                    </tr>
                </tbody>
            </table>
        @endforelse
    </div>
@stop

@section('javascript')
    <script>
        $(function () {
            $('#class').on('change', function () {
                $('#class_form').submit();
            });
        });
    </script>
@stop