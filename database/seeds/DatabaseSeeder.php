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
        $this->call([UsersTableSeeder::class]);
        $this->call([FieldSeeder::class]);
        $this->call([MajorSeeder::class]);
        $this->call([TownshipSeeder::class]);
        $this->call([UniversitySeeder::class]);
        
    }
}
