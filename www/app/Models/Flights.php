<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $transporter_id
 * @property int $departure_airport_id
 * @property string $flight_number
 * @property int $arrival_airport_id
 * @property string $departure_at
 * @property string $arrival_at
 * @property string $created_at
 * @property string $updated_at
 * @property Transporter $transporter
 * @property Airport $airport
 */
class Flights extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['transporter_id', 'departure_airport_id', 'flight_number', 'arrival_airport_id', 'departure_at', 'arrival_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transporter()
    {
        return $this->belongsTo('App\Models\Transporter');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function airport()
    {
        return $this->belongsTo('App\Models\Airport', 'departure_airport_id');
    }
}
