<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiUserController extends ApiController
{
    public function index(Request $request){
        $userList = [];
        // return $this->sendSuccess($userList, "Ini Pesan");
        // return $this->sendMassage( "ini pesan");
        // return $this->sendBadrequest( "ini pesan");
        return $this->sendForbidden( "ini pesan");

    }
    public function show(Request $request, $id){

    }
    public function store(Request $request){

    }
    public function update(Request $request, $id){

    }
    public function destroy(Request $request, $id){

    }
}
