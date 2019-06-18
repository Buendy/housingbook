<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['Amsterdam', 'Athens', 'Oslo', 'Berlin', 'Bilbao', 'Bordeaux', 'Brussels', 'Bucharest', 'Copenhagen', 'Dublin',
            'Glasgow', 'Hamburg', 'Hospitalet de Llobregat', 'Leicester', 'Lisbon', 'London', 'Lyon', 'Madrid', 'Manchester', 'Milan',
            'Montpellier', 'Munich', 'Naples', 'Nice', 'Palermo', 'Paris', 'Portsmouth', 'Prague', 'Rome', 'Senglea', 'Seville', 'Stockholm',
            'The Hague', 'Toulouse', 'Turin', 'Valencia', 'Vienna', 'A Coruña'];

        foreach ($cities as $key => $value){
            factory(\App\City::class,1)->create([
                'name' => $value,
            ]);
        }
    }
}
