<?php

namespace App\Models;
use DB;

// use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends MyBaseModel
{
    // use SoftDeletes;

    public function organiser()
    {
        return $this->belongsTo('\App\Models\Organiser');
    }

    public function getGroupsAttribute()
    {
        return DB::select('select * from groups where department_id = ?', [$this->id]);
    }
}
