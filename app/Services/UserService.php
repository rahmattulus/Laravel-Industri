<?php
namespace App\Services;

use App\Repository\UserRepository;

class UserService{

    public function __construct(
        public $repository = new UserRepository
    ){}

    public function FechAll(){
        $data = $this->repository->FechAll();

        foreach ($data as $row) {
             $row->date = date("d-m-Y", strtotime($row->created_at));

            // $row->time = $row->created_at->diffForHumans();

        }

        return $data;

    }



}