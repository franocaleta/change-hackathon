<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function attend($eventId)
    {
        $event = Event::whereId($eventId)->first();
        $userId = auth()->id();
        #dd($users);
        $event->attendants()->attach([$userId]);
        $event->save();
        return back();
    }


    public function myProfile()
    {
        $user = auth()->user();
        return view('myProfile', compact('user'));
    }


    public function update(Request $request)
    {
        //
        $data = $request->all();
        $user = auth()->user();

        if (Input::file('picture')) {


            $lala = Input::file('picture');
            $extension = Input::file('picture')->getClientOriginalExtension();
            $destinationPath = 'img/profile/';
            $fileName = rand(11111, 99999) . '.' . $extension;  // renaming image
            Input::file('picture')->move($destinationPath, $fileName);

            $user->update([
                'profilePic' => $fileName,
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'country' => $data['country'],
                'zipcode' => $data['zipcode'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'city' => $data['city'],
                'about_me' => $data['aboutMe'],
            ]);
            $user->profilePic = $fileName;
        }

        $user->update([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'zipcode' => $data['zipcode'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'about_me' => $data['aboutMe'],
        ]);
        $user->save();
        return redirect('/second');
    }
}
