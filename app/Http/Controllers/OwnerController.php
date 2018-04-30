<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;


class OwnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::where('isConfirmed', '=', 0)->get();

        #dd($events);
        $eventsConfirmed = Event::where('isConfirmed', '=', 1)->get()->first();
        //dd(count($eventsConfirmed->attendants()->get()));
        return view('requested', compact('events'));
    }

    public function confirmCreator($id)
    {
        $event = Event::whereId($id)->first();
        $event->isConfirmed = 1;
        $event->save();
        #dd($user);
        return view('home');
    }






    }
