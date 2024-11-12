<?php

namespace Database\Seeders;

use App\Models\Vission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vission::create([
            "title"=>"Test Title",
            "description"=>"This is test description",
            "button_url"=>"https://www.facebook.com",
        ]);
    }
}
