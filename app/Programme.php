<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description','channel_id'];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function timetable()
    {
    }
}
