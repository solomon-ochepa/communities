<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Roles
            ['name' => 'role'],
            ['name' => 'role.create'],
            ['name' => 'role.list'],
            ['name' => 'role.show'],
            ['name' => 'role.edit'],
            ['name' => 'role.delete'],
            // 
            ['name' => 'designation'],
            ['name' => 'designation.create'],
            ['name' => 'designation.edit'],
            ['name' => 'designation.list'],
            ['name' => 'designation.show'],
            ['name' => 'designation.delete'],
            // 
            ['name' => 'department'],
            ['name' => 'department.create'],
            ['name' => 'department.edit'],
            ['name' => 'department.list'],
            ['name' => 'department.show'],
            ['name' => 'department.delete'],
            // 
            ['name' => 'employee'],
            ['name' => 'employee.create'],
            ['name' => 'employee.edit'],
            ['name' => 'employee.list'],
            ['name' => 'employee.show'],
            ['name' => 'employee.delete'],
            // 
            ['name' => 'visitor'],
            ['name' => 'visitor.create'],
            ['name' => 'visitor.edit'],
            ['name' => 'visitor.list'],
            ['name' => 'visitor.show'],
            ['name' => 'visitor.delete'],
            // 
            ['name' => 'pre-register'],
            ['name' => 'pre-register.create'],
            ['name' => 'pre-register.edit'],
            ['name' => 'pre-register.list'],
            ['name' => 'pre-register.show'],
            ['name' => 'pre-register.delete'],
            // 
            ['name' => 'user'],
            ['name' => 'user.create'],
            ['name' => 'user.edit'],
            ['name' => 'user.list'],
            ['name' => 'user.show'],
            ['name' => 'user.delete'],
            // 
            ['name' => 'attendance'],
            ['name' => 'attendance.create'],
            ['name' => 'attendance.edit'],
            ['name' => 'attendance.list'],
            ['name' => 'attendance.show'],
            ['name' => 'attendance.delete'],
            // 
            ['name' => 'language'],
            ['name' => 'language.create'],
            ['name' => 'language.edit'],
            ['name' => 'language.list'],
            ['name' => 'language.delete'],
            // 
            ['name' => 'addon'],
            ['name' => 'addon.create'],
            ['name' => 'addon.list'],
            ['name' => 'addon.delete'],
            // Others
            ['name' => 'dashboard'],
            ['name' => 'profile'],
            ['name' => 'setting'],
            ['name' => 'visitor-report'],
            ['name' => 'pre-register-report'],
            ['name' => 'attendance-report'],
            // 
            // ['name' => ''],
            // ['name' => '.create'],
            // ['name' => '.edit'],
            // ['name' => '.list'],
            // ['name' => '.show'],
            // ['name' => '.delete'],
        ];

        foreach ($permissions as $key => $permission) {
            Permission::firstOrCreate(['name' => $permission['name'], 'guard_name' => 'web']);
        }
    }
}
