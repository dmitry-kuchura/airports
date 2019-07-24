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
