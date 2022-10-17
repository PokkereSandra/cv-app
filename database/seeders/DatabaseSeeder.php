<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        User::factory(10)
            ->hasAddress(1)
            ->hasBonuses(1)
            ->hasDescription(1)
            ->hasEducations(1)
            ->hasJobs(1)
            ->hasLanguages(1)
            ->hasLinks(1)
            ->create();

    }
}
