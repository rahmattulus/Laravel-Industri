<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function __construct(public $model = User::class)
    {}
    public function FechAll()
    {
        return $this->model::query()
            ->latest("id")
            ->get();
    }
}
