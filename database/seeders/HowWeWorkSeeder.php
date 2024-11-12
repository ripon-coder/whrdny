<?php

namespace Database\Seeders;

use App\Models\HowWeWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HowWeWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HowWeWork::create([
            "title"=>"This is test title",
            "details"=>"This is test description",
            "button_url"=>"https://www.facebook.com",
        ]);
    }
}
