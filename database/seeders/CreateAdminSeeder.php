<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // === Super admin ===
        $superAdmin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => bcrypt('123456'),
            'mobile' => '123456789',
        ]);

        $superRole = Role::find(1);
        $permissions = Permission::pluck('id')->all();
        $superRole->syncPermissions($permissions);
        $superAdmin->assignRole([$superRole->id]);

        // === Regular admin ===
        $regularAdmin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'mobile' => '123956789',
        ]);
        $adminRole = Role::find(2);
        $permissions = Permission::pluck('id')->all();
        $adminRole->syncPermissions($permissions);
        $regularAdmin->assignRole([$adminRole->id]);

        // for($i=0; $i<10000; $i++)
        // {
        //     $regularAdmin = Admin::create([
        //         'name' => $this->quickRandom(5),//$faker->name,
        //         'email' => $this->quickRandom(5).'@'.$this->quickRandom(5).'com',
        //         'password' => bcrypt('123456'),
        //         'mobile' => $this->quickRandom(12, true),
        //     ]);
        //     $adminRole = Role::find(2);
        //     $permissions = Permission::pluck('id')->all();
        //     $adminRole->syncPermissions($permissions);
        //     $regularAdmin->assignRole([$adminRole->id]);
        // }

    }

    public static function quickRandom($length = 16, $num = null)
    {
        if($num)
        {
            $pool='0123456789';
        }
        else
        {
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        }

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

}
