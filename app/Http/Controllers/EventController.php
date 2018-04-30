<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Event;
use App\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use DateTime;
use Carbon\Carbon;

class EventController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $events = Event::latest()->where('isConfirmed', '=', 1)->get();
        #dd($events->first()->tags()->get() );
        #dd($events->first()->receiver()->first());
        Carbon::setLocale('hr');
        #dd(Carbon::now()->diffForHumans());
        return view('events', compact('events'));
    }



    public function search(Request $request)
    {



        $tags = Tag::search($request->title)->paginate(9);;
        #dd($tags->get());

        #$tags = Tag::paginate(6);

        $events = new Collection();

        foreach ($tags as $tag){
            #dd($tag);
            foreach ($tag->events as $event){


                if($events->contains($event)){
                    continue;
                }

                $events->add($event);
            }
        }

        return view('search',compact('events'));


    }


    public function store(Request $request)
    {


        #dd($request->all());


        $data = $request->all();


        if (Input::file('picture')) {

            $data = $request->all();
            $lala = Input::file('picture');
            $extension = Input::file('picture')->getClientOriginalExtension();
            $destinationPath = 'img/';
            $fileName = rand(11111, 99999) . '.' . $extension;  // renaming image
            Input::file('picture')->move($destinationPath, $fileName);
            $day = request('day');
            $year = request('year');
            $month = request('month');
            $day = 11;
            $month = 12;
            $year = 2018;
            Carbon::setLocale('hr');
            #dd(Carbon::parse('11/06/1990')->diffForHumans());

           # dd(Carbon::now()->diffForHumans());

            $date = (Carbon::parse(''.$day.'/'.$month.'/'.$year)->format('d/m/Y'));
            $event = Event::create([
                'name' => request('name2'),
                'creatorId' => auth()->id(),
                'description' => request('description2'),
                'address' => request('address2'),
                'city' => request('city2'),
                'zipcode' => request('zipcode2'),
                'country' => request('country2'),
                'isConfirmed' => 0,
                'picture' => $fileName,
                'date' => $date
                #'day' =>
                #'year'=>request('year'),
                #'month'=>request('month'),

                //image

            ]);
            //dd("maci");
            $tags = $data['myInputs'];

            // dd($tags);
            foreach ($tags as $eachInput) {


                $tag = Tag::where('name', '=', $eachInput)->first();


                if (is_null($tag)) {
                    $tag = new Tag();
                    $tag->name = $eachInput;
                    $tag->save();
                    // dd($tag);

                }
                $event->tags()->attach([$tag->id]);
            }
            $event->save();


            //  dd($lala);
        }

//            $event = Event::create([
//                'name' => request('name2'),
//                'creatorId' => auth()->id(),
//                'description' => request('description2'),
//                'address' => request('address2'),
//                'city' => request('city2'),
//                'zipcode' => request('zipcode2'),
//                'country' => request('country2'),
//                'isConfirmed' => 0
//            ]);

        //  dd(auth()->id())  ;
        return back();
    }

    public function attendants($eventId)
    {
        $event = Event::whereId($eventId)->first();
        $attendants = $event->attendants()->get();
        return view('attendants', compact('event'));

    }

    public function create()
    {
        return view('createEvent');
    }

}
