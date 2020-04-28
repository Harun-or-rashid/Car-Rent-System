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
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(CarTypesTableSeeder::class);
         $this->call(CarsTableSeeder::class);
         $this->call(CarRequestsTableSeeder::class);
         $this->call(ContactsTableSeeder::class);
    }
}
