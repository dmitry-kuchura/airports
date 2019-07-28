<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $label
 * @property string $name
 * @property string $city
 * @property string $country
 * @property string $timezone
 * @property string $created_at
 * @property string $updated_at
 * @property Flight[] $flights
 */
class Airports extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'airports';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['label', 'name', 'city', 'country',  'timezone', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flights()
    {
        return $this->hasMany('App\Models\Flight', 'departure_airport_id');
    }
}
