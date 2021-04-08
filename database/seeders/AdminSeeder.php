<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Ubacivanje Admin-a u bazu preko Seeder-a

        $password = "passAdmin";
        $passHash = Hash::make($password);
        User::create(["firstName"=>"Danilo","lastName"=>"Mijailovic","email"=>"danilo@gmail.com","password"=>$passHash,"role_id"=>"1"]);

    }
}
