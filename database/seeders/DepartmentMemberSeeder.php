<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\DepartmentMember;

class DepartmentMemberSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $department_members = [
            [
                'department_id' => 1,
                'employee_id' => 6,
            ],
            [
                'department_id' => 1,
                'employee_id' => 9,
            ],
            [
                'department_id' => 4,
                'employee_id' => 12,
            ],
            [
                'department_id' => 5,
                'employee_id' => 1,
            ],
        ];

        foreach ($department_members as $department_member) {
            DepartmentMember::create($department_member);
        }
    }
}
