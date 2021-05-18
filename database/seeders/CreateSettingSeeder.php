<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\Country;
use Str;

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

        for($i=0; $i<500;$i++){
        Country::create([
            'name' => ['en' => Str::random(5), 'ar' => Str::random(5)],
            'name_code' => Str::random(6),
            'phone_code' => uniqid(),
            'status' =>  $i%2 == 0 ? '1' : '0',
        ]);
    }

    }
}
