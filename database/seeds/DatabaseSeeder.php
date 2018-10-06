<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         $this->call(LocationsSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(UsersSeeder::class);
    }
}
