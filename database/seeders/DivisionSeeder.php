<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
            [
                'id' => 1,
                'name' => 'Germany',
                'leader_id' => 14,
            ],
            [
                'id' => 2,
                'name' => 'Austria',
                'leader_id' => 19,
            ],
            [
                'id' => 3,
                'name' => 'Switzerland',
                'leader_id' => 3,
            ],
        ];

        foreach ($divisions as $division) {
            Division::create($division);
        }
    }
}
