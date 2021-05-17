<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\Country;

class CreateSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'project_name' => ["en"=>"laravel core project","ar"=>"مشروع لارفيل الاساسي"],
        ]);

        Country::create([
            'name' => ['en' => 'Egypt', 'ar' => 'مصر'],
            'name_code' => 'egy',
            'phone_code' => '020',
        ]);

    }
}
