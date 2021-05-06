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
        $user = Admin::create([
            'name' => 'Amr Aly',
            'email' => 'amr@y.com',
            'password' => bcrypt('123456'),
            'mobile' => '9999',
        ]);

        $role = Role::create(['name' => 'Admin', 'guard_name' => 'admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
