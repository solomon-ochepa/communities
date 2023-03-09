<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::find(1);
        if (!blank($role)) {
            $role->givePermissionTo(Permission::all());
        }

        $employeePermission[]['name'] = 'dashboard';
        $employeePermission[]['name'] = 'profile';
        $employeePermission[]['name'] = 'visitors';
        $employeePermission[]['name'] = 'visitor.show';
        $employeePermission[]['name'] = 'pre-registers';
        $employeePermission[]['name'] = 'pre-register.create';
        $employeePermission[]['name'] = 'pre-register.edit';
        $employeePermission[]['name'] = 'pre-register.delete';
        $employeePermission[]['name'] = 'pre-register.show';

        $permissions = Permission::whereIn('name', $employeePermission)->get();

        $role = Role::find(2);
        $role->givePermissionTo($permissions);


        $receptionPermission[]['name'] = 'dashboard';
        $receptionPermission[]['name'] = 'profile';
        $receptionPermission[]['name'] = 'employees';
        $receptionPermission[]['name'] = 'employee.show';
        $receptionPermission[]['name'] = 'visitors';
        $receptionPermission[]['name'] = 'visitor.create';
        $receptionPermission[]['name'] = 'visitor.edit';
        $receptionPermission[]['name'] = 'visitor.show';
        $receptionPermission[]['name'] = 'pre-registers';
        $receptionPermission[]['name'] = 'pre-register.create';
        $receptionPermission[]['name'] = 'pre-register.edit';
        $receptionPermission[]['name'] = 'pre-register.show';

        $receptionPermissions = Permission::whereIn('name', $receptionPermission)->get();

        $role = Role::find(3);
        if (!blank($role)) {
            $role->givePermissionTo($receptionPermissions);
        }
    }
}
