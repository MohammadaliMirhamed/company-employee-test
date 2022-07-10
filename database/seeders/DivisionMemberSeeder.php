<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\DivisionMember;

class DivisionMemberSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $division_members = [
            [
                'division_id' => 3,
                'employee_id' => 4,
            ],
            [
                'division_id' => 3,
                'employee_id' => 7,
            ],
            [
                'division_id' => 2,
                'employee_id' => 6,
            ],
        ];

        foreach ($division_members as $division_member) {
            DivisionMember::create($division_member);
        }
    }
}
