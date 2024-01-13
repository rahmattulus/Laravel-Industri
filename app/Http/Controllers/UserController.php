<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        // $listUser = User::all();

        // $listUser = User::query()
        //     ->select(['id', 'name', 'age', 'email', 'addres'])
        //     // ->orderBy('id', 'desc')
        //     // ->where('id', 2)
        //     ->latest('id')
        //     ->get();

        $listUser = DB::table('users')
        ->select(['id', 'name', 'age', 'email', 'addres'])
            // ->orderBy('id', 'asc')
            // ->where('id', 2)
            ->latest('id')
            ->get();

        return $listUser;
    }

    public function create(){
        // User::create([
        //     'name' => 'Padma',
        //     'age' => '22',
        //     'addres' => 'Luxemberg',
        //     'email'=>'padma@mail.org',
        //     'phone_num' => 911
        // ]);

        DB::table('users')
        ->insert([
            'name' => 'Alman',
            'age' => '27',
            'addres' => 'Utopia',
            'email'=>'udin@mail.org',
            'phone_num' => 123
        ]);
        
        return 'ADD Data';
    }

    public function update(){
        DB::table('users')
        -> where('id', 3)
        ->update([
            'addres' => 'Mongolia',
        ]);

        return 'Update Data';
    }

    public function delete(){
        // User::query()
        // ->where('id', 1)
        // ->delete();
        DB::table('users')
        ->where('id', 3)
        ->delete();
    }
}
