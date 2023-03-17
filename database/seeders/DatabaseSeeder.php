<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert(
            [
            'email'=>'s.garcia22@ciaf.edu.co',
            'rol'=>'Admin',
            'password'=> Hash::make(123456)]);

        DB::table('admins')->insert(
            [
            'nombre'=>'Sebastian',
            'apellidos'=>'Garcia Ramirez',
            'tipo_identificacion'=>'CC',
            'num_identificacion'=>1004756645,
            'rh'=>'O+',
            'genero'=>'Masculino',
            'fecha_nacimiento'=>'2001-02-22',
            'user_id'=> 1 ]);    
    }
}
