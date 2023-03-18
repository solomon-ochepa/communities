<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name'      => 'Dashboard',
                'url'       => route('dashboard'),
                'icon'      => 'fas fa-laptop',
            ],
            [
                'name'      => 'Staff Management',
                'url'       => '#',
                'icon'      => 'fas fa-archive',
                'child'     => [
                    [
                        'name'      => 'Staff',
                        'url'      => 'office/employees',
                        'icon'      => 'fas fa-user-secret',
                    ],
                    [
                        'name'      => 'Departments',
                        'url'      => 'office/departments',
                        'icon'      => 'fas fa-building',
                    ],
                    [
                        'name'      => 'Designations',
                        'url'      => route('office.designation.index'),
                        'icon'      => 'fas fa-layer-group',
                    ],
                ]
            ],
            [
                'name'      => 'Visitors Management',
                'url'       => '#',
                'icon'      => 'fas fa-archive',
                'child'     => [
                    [
                        'name'      => 'Visitors',
                        'url'      => 'office/visitors',
                        'icon'      => 'fas fa-walking',
                    ],
                    [
                        'name'      => 'Pre-registers',
                        'url'      => 'office/pre-registers',
                        'icon'      => 'fas fa-user-friends',
                    ],

                ]
            ],
            [
                'name'      => 'Reports',
                'url'       => '#',
                'icon'      => 'fas fa-archive',
                'child'     => [
                    [
                        'name'      => 'Visitor',
                        'url'       => 'office/admin-visitor-report',
                        'icon'      => 'fas fa-list-alt',
                    ],
                    [
                        'name'      => 'Pre-registers',
                        'url'       => 'office/admin-pre-registers-report',
                        'icon'      => 'fas fa-list-alt',
                    ],
                    [
                        'name'      => 'Attendance',
                        'url'       => 'office/attendance-report',
                        'icon'      => 'fas fa-clock',
                    ],
                ]
            ],
            [
                'name'      => 'Manage Users',
                'url'      => '#',
                'icon'      => 'fas fa-id-card ',
                'child'     => [
                    [
                        'name'      => 'All Users',
                        'url'      => route('office.user.index'),
                        'icon'      => 'fas fa-users',
                        'priority'  => 0
                    ],
                    [
                        'name'      => 'Role',
                        'url'      => 'office/role',
                        'icon'      => 'fa fa-star',
                        'priority'  => 0
                    ],
                ]
            ],
            [
                'name'      => 'Attendance',
                'url'       => 'office/attendance',
                'icon'      => 'fas fa-clock',
            ],
            [
                'name'      => 'Settings',
                'url'      => '#',
                'icon'      => 'fas fa-id-card ',
                'child'     => [
                    [
                        'name'      => 'Menus',
                        'url'      => 'office.menu.index',
                        'icon'      => 'fa fa-cog',
                    ],
                    [
                        'name'      => 'Language',
                        'url'      => 'office/language',
                        'icon'      => 'fas fa-globe',
                    ],
                    [
                        'name'      => 'Addons',
                        'url'      => 'office/addons',
                        'icon'      => 'fa fa-crosshairs',
                    ],
                    [
                        'name'      => 'General Settings',
                        'url'      => 'office/setting',
                        'icon'      => 'fas fa-cogs',
                    ],
                ]
            ],
        ];

        $this->create_menus($menus);
    }

    public function create_menus($menus, $parent_id = null)
    {
        foreach ($menus as $key => $menu) {
            $created = Menu::firstOrCreate([
                'name' => Str::title($menu['name']), 'parent_id' => $parent_id
            ], [
                'url' => $menu['url'], 'icon' => $menu['icon'], 'priority' => $menu['priority'] ?? null,
            ]);

            if (isset($menu['child'])) {
                $this->create_menus($menu['child'], $created->id);
            }
        }
    }
}
