<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'id' => 1,
                'first_name' => 'Employee',
                'last_name' => 'One',
            ],
            [
                'id' => 2,
                'first_name' => 'Employee',
                'last_name' => 'Two',
            ],
            [
                'id' => 3,
                'first_name' => 'Employee',
                'last_name' => 'Three',
            ],
            [
                'id' => 4,
                'first_name' => 'Employee',
                'last_name' => 'Four',
            ],
            [
                'id' => 5,
                'first_name' => 'Employee',
                'last_name' => 'Five',
            ],
            [
                'id' => 6,
                'first_name' => 'Employee',
                'last_name' => 'Six',
            ],
            [
                'id' => 7,
                'first_name' => 'Employee',
                'last_name' => 'Seven',
            ],
            [
                'id' => 8,
                'first_name' => 'Employee',
                'last_name' => 'Eight',
            ],
            [
                'id' => 9,
                'first_name' => 'Employee',
                'last_name' => 'Nine',
            ],
            [
                'id' => 10,
                'first_name' => 'Employee',
                'last_name' => 'Ten',
            ],
            [
                'id' => 11,
                'first_name' => 'Employee',
                'last_name' => 'Eleven',
            ],
            [
                'id' => 12,
                'first_name' => 'Employee',
                'last_name' => 'Twelve',
            ],
            [
                'id' => 13,
                'first_name' => 'Employee',
                'last_name' => 'Thirteen',
            ],
            [
                'id' => 14,
                'first_name' => 'Employee',
                'last_name' => 'Fourteen',
            ],
            [
                'id' => 15,
                'first_name' => 'Employee',
                'last_name' => 'Fifteen',
            ],
            [
                'id' => 16,
                'first_name' => 'Employee',
                'last_name' => 'Sixteen',
            ],
            [
                'id' => 17,
                'first_name' => 'Employee',
                'last_name' => 'Seventeen',
            ],
            [
                'id' => 18,
                'first_name' => 'Employee',
                'last_name' => 'Eighteen',
            ],
            [
                'id' => 19,
                'first_name' => 'Employee',
                'last_name' => 'Nineteen',
            ],
            [
                'id' => 20,
                'first_name' => 'Employee',
                'last_name' => 'Twenty',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
