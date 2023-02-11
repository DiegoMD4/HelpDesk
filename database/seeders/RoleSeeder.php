<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new Roles;
        $role1->nombre_rol = "admin";
        $role1->save();

        $role2 = new Roles;
        $role2->nombre_rol = "tecnico";
        $role2->save();

        $role3 = new Roles;
        $role3->nombre_rol = "user";
        $role3->save();
    }
}
