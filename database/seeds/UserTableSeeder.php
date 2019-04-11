<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class,1)->create(['name' => 'Roberto',
            'last_name' => 'Gómez Casanova',
            'email' => 'robbertto.gomez@gmail.com',
            'address' => 'C/ Esperanza',
            'phone' => '677055293',
            'rol' => 1,
            'password' => bcrypt('123123Aa-')]);

        factory(\App\User::class,10)->create();
    }
}
