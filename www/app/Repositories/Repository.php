<?php

namespace App\Repositories;

interface Repository
{
    public function list();

    public function search(array $date);
}
