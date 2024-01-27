<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class myartisan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my:artisan ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10 ; $i++) { 
            DB::table('users')
            ->insert([
                'name' => $faker->name,
                'age' => $faker->numberBetween(17,40),
                'addres' => $faker->address,
                'email'=>$faker->email,
                'phone_num' => $faker->phoneNumber,
                'password' =>Hash::make($faker->password)
            ]);
        }

        $this->info('Created Succes');
        //
    }
}
