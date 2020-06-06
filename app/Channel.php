<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public $timestamps = false;

    public $incrementing = false; // for uuid, as Eloquent assumes that the primary key is an incrementing integer value

}
