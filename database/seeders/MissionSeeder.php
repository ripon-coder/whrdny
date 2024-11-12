<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mission::create([
            "title"=>"Test Title",
            "description"=>"This is test description",
            "button_url"=>"https://www.facebook.com",
        ]);
    }
}
