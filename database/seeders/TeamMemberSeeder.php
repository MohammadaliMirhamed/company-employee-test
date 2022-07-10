<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $team_members = [
            [
                'team_id' => 2,
                'employee_id' => 16,
            ],
            [
                'team_id' => 2,
                'employee_id' => 4,
            ],
            [
                'team_id' => 2,
                'employee_id' => 7,
            ],
            [
                'team_id' => 5,
                'employee_id' => 11,
            ],
            [
                'team_id' => 5,
                'employee_id' => 12,
            ],
            [
                'team_id' => 5,
                'employee_id' => 15,
            ],
            [
                'team_id' => 3,
                'employee_id' => 4,
            ],
            [
                'team_id' => 3,
                'employee_id' => 9,
            ],
            [
                'team_id' => 6,
                'employee_id' => 8,
            ],
            [
                'team_id' => 6,
                'employee_id' => 13,
            ],
            [
                'team_id' => 1,
                'employee_id' => 1,
            ],
            [
                'team_id' => 1,
                'employee_id' => 12,
            ],
            [
                'team_id' => 1,
                'employee_id' => 13,
            ],
            [
                'team_id' => 4,
                'employee_id' => 3,
            ],
            [
                'team_id' => 4,
                'employee_id' => 7,
            ],
            [
                'team_id' => 4,
                'employee_id' => 8,
            ],
            [
                'team_id' => 7,
                'employee_id' => 2,
            ],
            [
                'team_id' => 7,
                'employee_id' => 8,
            ],

        ];

        foreach ($team_members as $team_member) {
            TeamMember::create($team_member);
        }
    }
}
