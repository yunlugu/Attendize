<?php

namespace Modules\Volunteers\Repositories;

use App\Models\Event;
use App\Models\MyBaseModel;

class Volunteer extends MyBaseModel
{
    protected $table = 'volunteers';

    public function event(){
        return $this->belongsTo(Event::class, 'event_id');
    }

    public static function getVolunteersForEvent($id){
        return static::where('event_id', $id)->get();
    }
}