<?php

use Illuminate\Database\Seeder;

class ApartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Apartment::class,50)->create()->each(function (\App\Apartment $apartment){
            factory(\App\Photo::class, 5)->create(['apartment_id' => $apartment->id]);
        });
        ;
    }
}
