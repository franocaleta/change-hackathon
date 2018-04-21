<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    ATTENDANTS FOR EVENT {{ $event->name }}
</head>
<body>
<br>
@if(count($event->attendants()->get()) != 0)
    @foreach( $event->attendants()->get() as $attendant)

        {{$attendant->name}} <br>
    @endforeach
@else
    <p>No attendants</p>
@endif
</body>
</html>
