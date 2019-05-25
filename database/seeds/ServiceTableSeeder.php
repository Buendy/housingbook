<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $icons = [
            'fa fa-car',
            'fa fa-wifi',
            'fa fa-swimming-pool',
            'fas fa-smoking',
            'fas fa-snowflake',
            'fas fa-hamburger',
        ];

        $names = [
            'Parking',
            'Wi-Fi',
            'Piscina',
            'Permitido Fumar',
            'Aire acondicionado',
            'Cocina'
        ];


        foreach($icons as $key => $value){
            factory(\App\Service::class,1)->create([
                'name' => $names[$key],
                'icon' => $value,
            ]);
        }

    }
}
