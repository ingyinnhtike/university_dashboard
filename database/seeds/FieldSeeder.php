<?php

use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = config('field.fields');
        foreach ($fields as $field)
        {
            $field = \App\Field::Create([
                'name_en' => $field['name_en'],
                'name_mm' => $field['name_mm'],
            ]);
        }
    }
}
