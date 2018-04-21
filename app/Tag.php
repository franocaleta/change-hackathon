<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use Laravel\Scout\Searchable;
class Tag extends Model
{

    use Searchable;

    protected $fillable = [
        'name'
    ];
    public $timestamps = false;

    public function searchableAs()
    {
        return 'tags_index';
    }
    public function events(){

        return $this->belongsToMany(Event::class);
    }

}
