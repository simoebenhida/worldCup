<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];

    // public function getKeyName()
    // {
    //     return 'letter';
    // }

    public function getTeamsAttribute($value)
    {
        // $ok =  collect(json_decode($value,true))->map(function($item,$key){
        //     return $item['team'];
        // })->toArray();
        return collect(json_decode($value,true))->flatten(1);
        // $ok->each(function($item,$key) {
        //     dd($item['id']);
        // });
        // return json_decode($value,true);
    }
}
