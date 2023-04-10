<?php

namespace Modules\Menu\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Menu\app\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = array(
            array('id' => '97a5ba25-e90d-4278-a115-2dc3dc9d39c2', 'active' => 1, 'parent_id' => NULL, 'name' => 'Dashboard', 'slug' => 'dashboard', 'url' => 'dashboard', 'icon' => 'fas fa-laptop', 'priority' => '0'),
            array('id' => '97a5ba25-f162-4459-b19e-dbbc851b0d5c', 'parent_id' => NULL, 'name' => 'Manage Staff', 'slug' => 'manage_staff', 'url' => '#manage-staff', 'icon' => 'fas fa-archive', 'priority' => '80'),
            array('id' => '97a5ba25-f7d0-4317-a7ec-f339dddef115', 'parent_id' => '97a5ba25-f162-4459-b19e-dbbc851b0d5c', 'name' => 'Staff', 'slug' => 'staff', 'url' => 'office/employees', 'icon' => 'fas fa-user-secret', 'priority' => NULL),
            array('id' => '97a5ba25-fa31-4a8e-b16c-5c633d0bc2e9', 'parent_id' => '97a5ba25-f162-4459-b19e-dbbc851b0d5c', 'name' => 'Departments', 'slug' => 'departments', 'url' => 'office/departments', 'icon' => 'fas fa-building', 'priority' => NULL),
            array('id' => '97a5ba25-fc6a-4488-9e60-74e0f654d6ab', 'parent_id' => '97a5ba25-f162-4459-b19e-dbbc851b0d5c', 'name' => 'Designations', 'slug' => 'designations', 'url' => 'office/designations', 'icon' => 'fas fa-layer-group', 'priority' => NULL),
            array('id' => '97a5ba25-feb7-441b-bc66-5bd35d36b528', 'parent_id' => NULL, 'name' => 'Manage Visitors', 'slug' => 'manage_visitor', 'url' => '#manage-visitors', 'icon' => 'fas fa-archive', 'priority' => '4'),
            array('id' => '97a5ba26-012c-4691-964a-55b4dd9a6afa', 'parent_id' => '97a5ba25-feb7-441b-bc66-5bd35d36b528', 'name' => 'Visitors', 'slug' => 'visitors', 'url' => 'office/visitors', 'icon' => 'fas fa-walking', 'priority' => '2'),
            array('id' => '97a5ba26-05fa-4134-a81d-b03cb57faaec', 'parent_id' => '97a5ba25-feb7-441b-bc66-5bd35d36b528', 'name' => 'Pre-Registers', 'slug' => 'pre_registers', 'url' => 'office/pre-registers', 'icon' => 'fas fa-user-friends', 'priority' => '3'),
            array('id' => '97a5ba26-087c-462a-bf03-56a942236f3e', 'parent_id' => NULL, 'name' => 'Reports', 'slug' => 'reports', 'url' => '#reports', 'icon' => 'fas fa-archive', 'priority' => '100'),
            array('id' => '97a5ba26-0d38-49d4-8c1e-81e980711e6d', 'parent_id' => '97a5ba26-087c-462a-bf03-56a942236f3e', 'name' => 'Visitor', 'slug' => 'visitor_reports', 'url' => 'office/admin-visitor-report', 'icon' => 'fas fa-list-alt', 'priority' => '2'),
            array('id' => '97a5ba26-0f6f-4939-afd4-a49146f1165b', 'parent_id' => '97a5ba26-087c-462a-bf03-56a942236f3e', 'name' => 'Pre-Registers', 'slug' => 'pre_registers_reports', 'url' => 'office/admin-pre-registers-report', 'icon' => 'fas fa-list-alt', 'priority' => NULL),
            array('id' => '97a5ba26-119e-4b8a-bf43-b2d984a4ef2f', 'parent_id' => '97a5ba26-087c-462a-bf03-56a942236f3e', 'name' => 'Attendances', 'slug' => 'attendance_reports', 'url' => 'office/attendance-report', 'icon' => 'fas fa-clock', 'priority' => NULL),
            array('id' => '97a5ba26-1430-41a8-83a1-5cb2f84d7e2a', 'parent_id' => NULL, 'name' => 'Manage Users', 'slug' => 'manage_users', 'url' => '#manage-users', 'icon' => 'fas fa-id-card ', 'priority' => '40'),
            array('id' => '97a5ba26-16ee-431a-9fc2-ee4a2ac9cc13', 'parent_id' => '97a5ba26-1430-41a8-83a1-5cb2f84d7e2a', 'name' => 'All Users', 'slug' => 'users', 'url' => 'admin.user.index', 'icon' => 'fas fa-users', 'priority' => NULL),
            array('id' => '97a5ba26-196f-4d71-b191-13690b03abf1', 'parent_id' => '97a5ba26-1430-41a8-83a1-5cb2f84d7e2a', 'name' => 'Role', 'slug' => 'role', 'url' => 'office/role', 'icon' => 'fa fa-star', 'priority' => NULL),
            array('id' => '97a5ba26-1be8-4a10-a774-41ee4f195e7b', 'parent_id' => NULL, 'name' => 'Attendance', 'slug' => 'attendance', 'url' => 'office/attendance', 'icon' => 'fas fa-clock', 'priority' => '60'),
            array('id' => '97a5ba26-1e19-4add-b5b2-c668fc18d649', 'active' => 1, 'parent_id' => NULL, 'name' => 'Settings', 'slug' => 'settings', 'url' => '#settings', 'icon' => 'fas fa-id-card ', 'priority' => '1000'),
            array('id' => '97a5ba26-204d-40d1-a361-679f8b5573de', 'active' => 1, 'parent_id' => '97a5ba26-1e19-4add-b5b2-c668fc18d649', 'name' => 'Menus', 'slug' => 'menus', 'url' => 'admin.menu.index', 'icon' => 'fa fa-cog', 'priority' => NULL),
            array('id' => '97a5ba26-225e-441f-989c-742abfb3ebe0', 'parent_id' => '97a5ba26-1e19-4add-b5b2-c668fc18d649', 'name' => 'Language', 'slug' => 'language', 'url' => 'office/language', 'icon' => 'fas fa-globe', 'priority' => NULL),
            array('id' => '97a5ba26-248e-4f2c-b05d-c09595f4bbbb', 'parent_id' => '97a5ba26-1e19-4add-b5b2-c668fc18d649', 'name' => 'Addons', 'slug' => 'addons', 'url' => 'office/addons', 'icon' => 'fa fa-crosshairs', 'priority' => NULL),
            array('id' => '97a5ba26-26bc-4c67-87b8-af985c5075fb', 'parent_id' => '97a5ba26-1e19-4add-b5b2-c668fc18d649', 'name' => 'General Settings', 'slug' => 'general_settings', 'url' => 'office/setting', 'icon' => 'fas fa-cogs', 'priority' => NULL),
            array('id' => '97a5e2db-0098-42da-bed6-4af662a6966b', 'parent_id' => NULL, 'name' => 'Vehicles', 'slug' => 'vehicles', 'url' => 'admin.vehicle.index', 'icon' => 'fas fa-car', 'priority' => '30'),
            array('id' => '97a77cee-0b5c-42a8-a697-40119541ffce', 'active' => 1, 'parent_id' => NULL, 'name' => 'Apartments', 'slug' => 'apartments', 'url' => 'admin.apartment.index', 'icon' => 'fas fa-home', 'priority' => '20'),
            array('id' => '98afd1b5-f9c7-4823-af51-6078b270119e', 'parent_id' => '97a5ba25-feb7-441b-bc66-5bd35d36b528', 'name' => 'Visits', 'slug' => 'visits', 'url' => 'admin.visit.index', 'icon' => 'fa fa-users', 'priority' => '0'),
            array('id' => '98afee28-d890-4d4a-8730-40ae281aec94', 'active' => 1, 'parent_id' => NULL, 'name' => 'Tenants', 'slug' => 'tenants', 'url' => 'admin.tenant.index', 'icon' => 'fa fa-user-tie', 'priority' => '30')
        );

        $this->create_menus($menus);
    }

    public function create_menus($menus, $parent_id = null)
    {
        foreach ($menus as $menu) {
            $menu['name'] = Str::title($menu['name']);

            $created = Menu::firstOrCreate(Arr::only($menu, ['name', 'parent_id']), Arr::except($menu, ['child']));

            if (isset($menu['child'])) {
                $this->create_menus($menu['child'], $created->id);
            }
        }
    }
}
