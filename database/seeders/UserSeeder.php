<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'secsystem1030@gmail.com',
            'password' => bcrypt('@dm1nSecsystem')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Empleado',
            'email' => 'empleadosecsystem@gmail.com',
            'password' => bcrypt('3mpl3@do1')
        ])->assignRole('Empleado');
    }
}
