<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\EmployeeRepository;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $repo = new EmployeeRepository();
        for ($i = 0; $i < 20; $i++) {
            $repo->create([
                'name' => $faker->name(),
                'isManager' => $faker->boolean(20), // 20% chance manager
                'department' => $faker->randomElement(['HR', 'IT', 'Finance', 'Sales', 'Operations']),
                'employeeNumber' => $faker->unique()->numberBetween(1000, 9999),
            ]);
        }
    }
}
