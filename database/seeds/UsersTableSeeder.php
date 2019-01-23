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

        $verUser = Permission::create(['name'=>'Ver Usuarios']);
        $actUser = Permission::create(['name'=>'Actualizar Usuarios']);
        $crearUser = Permission::create(['name'=>'Crear Usuarios']);
        $borrarUser = Permission::create(['name'=>'Borrar Usuarios']);

        $verRole = Permission::create(['name'=>'Ver Roles']);
        $actRole = Permission::create(['name'=>'Actualizar Roles']);
        $crearRole = Permission::create(['name'=>'Crear Roles']);
        $borrarRole = Permission::create(['name'=>'Borrar Roles']);

        $user = new User;

        $user->name = "Ric";
		$user->email = "r@rr.es";
		$user->username = "ricardo.bm";
		$user->password = ('123');
		$user->save();
        $user->assignRole($adminRole);


        $user = new User;

        $user->name = "Pepe";
        $user->email = "pepe@rr.es";
        $user->username = "pepe";
        $user->password = ('123');
        $user->save();
        $user->assignRole($userRole);

    }
}
