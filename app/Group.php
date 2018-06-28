<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];


    public function getTeamsAttribute($value)
    {
        return json_decode($value, true);
    }
}
