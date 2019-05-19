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

            $services = \App\Service::all()->random(rand(1,6));

            $users = \App\User::all()->random(2);

            foreach ($services as $service)
            {
                $apartment->services()->attach($service->id);
            }

            foreach ($users as $user)
            {
                $apartment->users()->attach($user->id, ['total' => rand(20, 600), 'entry' => \Carbon\Carbon::now()->subDays(rand(0,20)),'exit' => \Carbon\Carbon::now()->addDays(rand(2,5))]);
            }
        });
    }
}
