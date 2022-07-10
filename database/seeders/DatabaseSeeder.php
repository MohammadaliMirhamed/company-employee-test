<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeeSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(TeamSeeder::class);

        $this->call(DivisionMemberSeeder::class);
        $this->call(DepartmentMemberSeeder::class);
        $this->call(TeamMemberSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
