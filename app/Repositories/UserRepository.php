<?php

namespace App\Repositories;

use App\Models\User as Model;

class UserRepository extends Repository
{
    public function model(): string
    {
        return Model::class;
    }
}
