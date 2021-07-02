<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoleGroup;

class RoleGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleGroup::create([
            'code' => 'helper',
            'name' => 'helper',
            'description' => 'Helps',
        ]);

        RoleGroup::create([
            'code' => 'vice',
            'name' => 'vice administrator',
            'description' => 'can edit some...',
        ]);

        RoleGroup::create([
            'code' => 'dev',
            'name' => 'dev',
            'description' => 'Dev',
        ]);
    }
}
