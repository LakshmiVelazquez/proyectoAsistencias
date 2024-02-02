<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Llamar al seeder de roles
        $this->call(RolesTableSeeder::class);
        
        $user = new User();
        $user -> name = "Administrador";
        $user -> email = "lisca@email.com";
        $user -> tipo = "A";
        $user -> password = bcrypt("lisca");
        $user -> imagen = "./images/user.png";
        $user -> save();
        
    }
}
