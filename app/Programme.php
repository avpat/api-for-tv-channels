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

    public $incrementing = false; // for uuid, as Eloquent assumes that the primary key is an incrementing integer value

    protected $fillable = ['name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
