<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superRole = Role::where([['name', 'Super admin'], ['guard_name','admin']])->first();
        $adminRole = Role::where([['name', 'admin'], ['guard_name','admin']])->first();

        if(!$superRole)
        {
            Role::create(['name' => 'Super admin', 'guard_name' => 'admin']);
        }

        if(!$adminRole)
        {
            Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        }

        $dbPermissions = Permission::select('name')->get();

        $superPermissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
        ];

        foreach($superPermissions as $permission)
        {
            $exstingPermission = Permission::where('name', $permission)->first();

            if(!$exstingPermission)
            {
                $permission = Permission::create(['name' => $permission, 'guard_name' => 'admin']);
            }
        }

        foreach($dbPermissions as $permission)
        {
            if(!in_array($permission->name, $superPermissions))
            {
                Permission::where('name', $permission->name)->delete();
            }
        }
    }
}
