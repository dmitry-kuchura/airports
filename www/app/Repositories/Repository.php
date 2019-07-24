<?php

namespace App\Repositories;

interface Repository
{
    public function list();

    public function store($data);

    public function update($data);

    public function get($id);

    public function destroy($id);
}
