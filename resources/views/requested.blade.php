<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    REQUESTS
</head>
<body>

@foreach( $events as $event)
    {{ $event->id }} <form method="POST" action="/confirmCreator/{{ $event->id }}">
        {{ csrf_field() }}
        <button>Potvrdi event </button>{{ $event->name }}
    </form>
@endforeach
</body>
</html>
