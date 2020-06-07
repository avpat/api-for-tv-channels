<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Programme
 * @package App
 */
class Programme extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description','channel_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
