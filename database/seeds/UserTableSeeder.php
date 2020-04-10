<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','Administrador')->first();
        $role_vendor = Role::where('name','Vendedor')->first();

        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('12345678');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = "Vendor";
        $user->email = "vendor@gmail.com";
        $user->password = bcrypt('12345678');
        $user->save();
        $user->roles()->attach($role_vendor);

    }
}
