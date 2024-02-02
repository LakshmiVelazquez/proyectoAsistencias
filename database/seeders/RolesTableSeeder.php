<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles predefinidos
        $roles = ['admin', 'user'];

        // Insertar roles en la tabla 'roles'
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
    }
    }
}

