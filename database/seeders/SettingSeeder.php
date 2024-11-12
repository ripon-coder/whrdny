<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            "logo" => null,
            "fevicon" => null,
            "email" => "globaloffice2006@gmail.com",
            "facebook" => "https://www.facebook.com",
            "twitter" => "https://www.twitter.com",
            "linkdin" => "https://www.linkdin.com",
            "instragram" => "https://www.instragram.com",
            "youtube" => "https://www.youtube.com",
            "address_one_title" => "NEW YORK OFFICE:",
            "address_one_mobile" => "(718) 205-2360,(917) 345-4850",
            "address_one_email" => "globaloffice2006@gmail.com",
            "address_one_address" => "37-18, 74th Street, Suite-202, Jackson Heights, NY 11372",
            "address_two_title" => "DHAKA BD OFFICE:",
            "address_two_mobile" => "01886-995567,01616-995567",
            "address_two_email" => "globaloffice2006@gmail.com",
            "address_two_address" => "House#39/A, Road#8 (Ground Fl) Dhanmondi, Dhaka-1205",
        ]);
    }
}
