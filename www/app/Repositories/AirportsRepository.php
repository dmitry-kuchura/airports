<?php

namespace App\Repositories;

use App\Models\Airports;

class AirportsRepository implements Repository
{
    protected $model = Airports::class;

    public function list()
    {
        return $this->model::all();
    }

    public function search(array $date)
    {
        // TODO: Implement search() method.
    }
}
