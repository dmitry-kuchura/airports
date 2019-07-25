<?php

namespace App\Repositories;

use App\Models\Flights;
use Carbon\Carbon;

class SearchRepository implements Repository
{
    public function search($data)
    {
        $from = Carbon::parse($data['departureDate'])->startOfDay()->format('Y-m-d H:i:s');
        $to = Carbon::parse($data['departureDate'])->endOfDay()->format('Y-m-d H:i:s');

        return Flights::select(
            'transporters.code as transporters_code',
            'transporters.name as transporters_name',
            'flight_number',
            'departure.name AS departure_name',
            'arrival.name AS arrival_name',
            'departure_at',
            'arrival_at'
        )
            ->leftJoin('airports as arrival', 'arrival.id', '=', 'flights.arrival_airport_id')
            ->leftJoin('airports as departure', 'departure.id', '=', 'flights.departure_airport_id')
            ->leftJoin('transporters', 'transporters.id', '=', 'flights.transporter_id')
            ->where('departure.key', $data['departureAirport'])
            ->where('arrival.key', $data['arrivalAirport'])
            ->where('flights.departure_at', '>', $from)
            ->where('flights.departure_at', '<', $to)
            ->get();
    }

    public function list()
    {
        // TODO: Implement list() method.
    }

    public function store($data)
    {
        // TODO: Implement store() method.
    }

    public function update($data)
    {
        // TODO: Implement update() method.
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
