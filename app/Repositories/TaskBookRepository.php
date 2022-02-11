<?php

namespace App\Repositories;

use App\Models\TaskBook as Model;

class TaskBookRepository extends Repository
{
    public function model(): string
    {
        return Model::class;
    }
}
