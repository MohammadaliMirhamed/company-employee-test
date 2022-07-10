<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'id' => 1,
                'name' => 'Zurich',
                'leader_id' => 5,
                'division_id' => 3,
            ],
            [
                'id' => 2,
                'name' => 'Berlin',
                'leader_id' => 3,
                'division_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Munich',
                'leader_id' => 6,
                'division_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Salzburg',
                'leader_id' => 4,
                'division_id' => 2,
            ],
            [
                'id' => 5,
                'name' => 'Vienna',
                'leader_id' => 3,
                'division_id' => 2,
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
