<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

/**
 * Class Channel
 * @package App
 */
class Channel extends Model
{
    use Uuid;

    protected $keyType = 'string';
    protected $guarded = [];
    public $timestamps = false;


    public $incrementing = false; // for uuid, as Eloquent assumes that the primary key is an incrementing integer value

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }
}
