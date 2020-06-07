<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

/**
 * Class Programme
 * @package App
 */
class Programme extends Model
{
    use Uuid;

    protected $keyType = 'string';
    protected $guarded = [];
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
