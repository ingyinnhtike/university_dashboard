<?php

use App\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = config("major.majors");

        foreach ($majors as $major)
        {
            $major = Major::create([
                'name_en' => $major['name_en'],
                'name_mm' => $major['name_mm'],
            ]);
        }
    }
}
