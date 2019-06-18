<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
          'Montaña',
            'Ciudad',
            'Campo',
            'Playa'
        ];

        $colors = [
          '#877b5a',
          '#ff7575',
          '#94dd89',
          '#70d8d3'

        ];

        foreach ($names as $key => $value){
            factory(\App\Category::class,1)->create([
                'name' => $value,
                'color' => $colors[$key],
            ]);

        }
    }
}
