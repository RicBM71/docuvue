<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;

        $user->name = "Ric";
		$user->email = "r@rr.es";
		$user->username = "ricardo.bm";
		$user->password = bcrypt('123');
		$user->save();

        $user = new User;

        $user->name = "Pepe";
        $user->email = "pepe@rr.es";
        $user->username = "pepe";
        $user->password = bcrypt('123');
        $user->save();

    }
}
