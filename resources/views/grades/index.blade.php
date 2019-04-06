@foreach($grades as $grade)
    {{ $grade->mark }}
    {{ $grade->note }}
    {{ $grade->assign_date }}
    {{ $grade->teacher->name }}
    {{ $grade->student->name }}
    {{ $grade->subject->title }}
@endforeach