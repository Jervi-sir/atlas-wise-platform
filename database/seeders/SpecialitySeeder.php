<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speciality;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speciality::create([
            'name' => 'Informatique L1',
            'description' => '',
        ]);

        Speciality::create([
            'name' => 'Informatique L2',
            'description' => '',
        ]);
        
        Speciality::create([
            'name' => 'Informatique L3',
            'description' => '',
        ]);

        Speciality::create([
            'name' => 'Informatique M1',
            'description' => '',
        ]);

        Speciality::create([
            'name' => 'Informatique M2',
            'description' => '',
        ]);
     
    }
}
