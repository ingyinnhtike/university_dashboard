<?php

use App\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $universities = config('university.universities');
        foreach($universities as $university)
        {
            $university = \App\University::Create([
                'name_en' => $university['name_en'],
                'name_mm' => $university['name_mm'],
                'state_id' => $university['state_id'],
                'township_id' => $university['township_id'],
                'district_id' => $university['district_id'],
                'user_id' => $university['user_id'],
                'field_id' => $university['field_id'],
                'phone' => $university['phone'],
                'email' => $university['email'],
                'image' => $university['image'],
                'website' => $university['website'],
            ]);
        }
    }
}
