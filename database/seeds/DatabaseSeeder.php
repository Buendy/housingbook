<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/photos');

        Storage::makeDirectory('public/photos');

        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(ApartmentTableSeeder::class);
        //$this->call(PhotoTableSeeder::class);
        $this->call(CommentTableSeeder::class);

    }
}
