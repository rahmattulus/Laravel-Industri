<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends ApiController
{
    public function index(Request $request){
        $userList = User::query()
            ->select(['id', 'name', 'age', 'email', 'addres'])
            ->latest('id')
            ->get();
        return $this->sendSuccess($userList) ;

    }
    public function show(Request $request, $id){
        $user = User::query()
        ->select(['id', 'name', 'age', 'email', 'addres'])
        ->where('id', $id)
        ->first();
        return $this->sendSuccess($user) ;
    }
    public function store(Request $request){
        User::create([
            'name' => 'Rahmat Tulus',
            'age' => '17',
            'email' => 'rahmat@erts.com',
            'addres'=> 'Purwokerto, Central java',
        ]);
        return $this->sendMassage('Berhasil Ditambahkan') ;
    }
    public function update(Request $request, $id){
        User::query()
        ->where('id', $id)
        ->update([
            'age' => '19'
        ]);
        return $this->sendMassage('Berhasil diubah') ;
    }
    public function destroy(Request $request, $id){
        User::query()
        ->where('id', $id)
        ->delete();

        return $this->sendMassage('Berhasil di hapus') ;
    }
}
