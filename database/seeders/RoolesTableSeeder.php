<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Crear REoles
        //Role de administrador
        $adminRole = Role::create(['name' => 'administrador']);
        //Role de usuario
        $userRole = Role::create(['name' => 'usuario']);

        // Asignae permisos a los roles
        $adminRole->givePermissionTo('borrar libros');

    }   
}
