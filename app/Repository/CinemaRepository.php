<?php

namespace App\Repository;

use App\Models\Cinema;

class CinemaRepository{
    public function __construct(public $model = Cinema::class)
    {}

    public function upload(array $data){
        return $this->model::create($data);
    }
}