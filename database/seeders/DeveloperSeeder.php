<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Developer;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Developer::create([
            'name' => 'DEV1',
            'level' => 1,
            'duration' => 1
        ]);
        Developer::create([
            'name' => 'DEV2',
            'level' => 2,
            'duration' => 1
        ]);
        Developer::create([
            'name' => 'DEV3',
            'level' => 3,
            'duration' => 1
        ]);
        Developer::create([
            'name' => 'DEV4',
            'level' => 4,
            'duration' => 1
        ]);
        Developer::create([
            'name' => 'DEV5',
            'level' => 5,
            'duration' => 1
        ]);
    }
}
