<?php

use Illuminate\Database\Seeder;

// Spatie Role Permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = Role::create(['name' => 'superadmin']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_user = Role::create(['name' => 'user']);

        $assign_role = Permission::create(['name' => 'assign role']);
        $assign_permission = Permission::create(['name' => 'assign permission']);
        $manage_admin = Permission::create(['name' => 'manage admin']);
        $manage_user = Permission::create(['name' => 'manage user']);

        $role_superadmin->syncPermissions(['manage admin','assign role','assign permission','manage user']);
        $role_admin->syncPermissions(['assign role','assign permission','manage user']);
        // $role_user->givePermissionTo($permission);
    }
}
