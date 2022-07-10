<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'id' => 1,
                'name' => 'Sales ZU',
                'leader_id' => 10,
                'department_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Sales Ber',
                'leader_id' => 17,
                'department_id' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Sales MU',
                'leader_id' => 18,
                'department_id' => 3,
            ],
            [
                'id' => 4,
                'name' => 'Marketing ZU',
                'leader_id' => 2,
                'department_id' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Marketing Ber',
                'leader_id' => 20,
                'department_id' => 2,
            ],
            [
                'id' => 6,
                'name' => 'Development MU',
                'leader_id' => 14,
                'department_id' => 3,
            ],
            [
                'id' => 7,
                'name' => 'Development AU',
                'leader_id' => 4,
                'department_id' => 4,
            ],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
