<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     /*
     $table->increments('id');
     $table->string('nombre');
     $table->string('paterno');
     $table->string('materno');
     $table->string('ci');
     $table->string('email')->unique();
     $table->string('telefono');
     $table->string('cargo');
     $table->string('ROLE');
     $table->string('password');
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('sistemas')
        ]);

    }
}
