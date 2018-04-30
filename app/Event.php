<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tag;
use Laravel\Scout\Searchable;

class Event extends Model
{
    protected $fillable = [
        'name', 'creatorId', 'description', 'address', 'zipcode', 'city', 'country', 'isConfirmed','picture','date'
    ];

    use Searchable;

    public function searchableAs()
    {
        return 'events_index';
    }
    public function attendants()
    {

        return $this->belongsToMany('App\User', 'event_user', 'event_id', 'user_id');
//        return $this->belongsToMany(User::class);
    }


    public function receiver()
    {

        $user = $this->belongsTo('App\User', 'creatorId');

        return $user;


    }
    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

}
