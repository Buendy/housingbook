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

            factory(\App\Photo::class, 4)->create(['apartment_id' => $apartment->id]);

            $services = \App\Service::all()->random(rand(1,6));

            $users = \App\User::all()->random(1);

            foreach ($services as $service)
            {
                $apartment->services()->attach($service->id);
            }

            foreach ($users as $user)
            {
                $entrada = \Carbon\Carbon::now()->subDays(rand(0,20));
                $salida = \Carbon\Carbon::now()->addDays(rand(2,5));

                $entradaDif = strtotime($entrada);
                $salidaDif = strtotime($salida);
                $datediff = $salidaDif - $entradaDif;

                $dif = ($datediff / (60 * 60 * 24));

                $apartment->users()->attach($user->id, ['total' => $dif * $apartment->price, 'entry' => $entrada,'exit' => $salida]);
            }
        });
    }
}
