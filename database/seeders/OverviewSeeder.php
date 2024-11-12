<?php

namespace Database\Seeders;

use App\Models\Overview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OverviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Overview::create([
            "details"=>"This is test description",
        ]);
    }
}
