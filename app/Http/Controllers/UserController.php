<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;

class UserController extends Controller
{
    public function attend($eventId)
    {
        $event = Event::whereId($eventId)->first();
        $userId =auth()->id();
        #dd($users);
        $event->attendants()->attach([$userId]);
        $event->save();
        return back();
    }
}
