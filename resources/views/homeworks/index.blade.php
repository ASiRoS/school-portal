@foreach($homeworks as $homework)
    {{ $homework->task }}
    {{ $homework->class->name }}
    {{ $homework->subject->title }}
@endforeach