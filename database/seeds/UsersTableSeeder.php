<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name'=>'Admin']);
        $userRole = Role::create(['name'=>'User']);

        $verPost = Permission::create(['name'=>'Ver Posts']);
        $actPost = Permission::create(['name'=>'Actualizar Posts']);
        $crearPost = Permission::create(['name'=>'Crear Posts']);
        $borrarPost = Permission::create(['name'=>'Borrar Posts']);

        $user = new User;

        $user->name = "Ric";
		$user->email = "r@rr.es";
		$user->username = "ricardo.bm";
		$user->password = bcrypt('123');
		$user->save();
        $user->assignRole($adminRole);


        $user = new User;

        $user->name = "Pepe";
        $user->email = "pepe@rr.es";
        $user->username = "pepe";
        $user->password = bcrypt('123');
        $user->save();
        $user->assignRole($userRole);

    }
}
