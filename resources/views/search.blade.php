@extends('layouts.app')

@section('content')
    <table>
        @foreach( $events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <div class="span2">
                    <img src="{{ URL::to('/') }}/img/{{$event->picture}}" width="400px">
                </div>
                <td> @if( !$event->attendants->contains(Auth::user()))

                        <form method="GET" action="/user/attend/{{ $event->id }}">
                            <button>Attendaj event</button>
                        </form>
                    @else
                        <p>YOU ARE ALREADY ATTENDING</p>
                    @endif
                </td>
                <td>
                    <form method="GET" action="/event/{{ $event->id }}/attendants">
                        <button>Pregledaj sve attendante</button>
                    </form>
                </td>
            </tr>
            Tagovi : <ul class="list-inline item-details">
                @foreach($event->tags as $tag)
                    <li>
                        <strong><a href="http://startbootstrap.com"><span class="label label-info">{{$tag->name}}</span></a>
                        </strong>
                    </li>
        @endforeach
        @endforeach    </table>

@endsection
