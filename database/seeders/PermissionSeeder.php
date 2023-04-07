<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // settings
            'settings',
            'settings.index',
            'settings.show',
            'settings.create',
            'settings.update',
            'settings.delete',
            // roles
            'roles',
            'roles.index',
            'roles.show',
            'roles.create',
            'roles.update',
            'roles.delete',
            // permissions
            'permissions',
            'permissions.index',
            'permissions.show',
            'permissions.create',
            'permissions.update',
            'permissions.delete',
            // users
            'users',
            'users.index',
            'users.show',
            'users.create',
            'users.update',
            'users.update.self',
            'users.delete',
            // admins
            'admins',
            'admins.index',
            'admins.show',
            'admins.create',
            'admins.update',
            'admins.delete',
            // agents
            'agents',
            'agents.index',
            'agents.show',
            'agents.create',
            'agents.update',
            'agents.delete',
            // statuses
            'statuses',
            'statuses.index',
            'statuses.show',
            'statuses.create',
            'statuses.update',
            'statuses.delete',
            // subscriptions
            'subscriptions',
            'subscriptions.index',
            'subscriptions.show',
            'subscriptions.create',
            'subscriptions.update',
            'subscriptions.delete',
            // user's subscriptions
            'users.subscriptions',
            'users.subscriptions.index',
            'users.subscriptions.show',
            'users.subscriptions.create',
            'users.subscriptions.update',
            'users.subscriptions.delete',
            // accounts
            'accounts',
            'accounts.index',
            'accounts.show',
            'accounts.create',
            'accounts.update',
            'accounts.delete',
            // user's accounts
            'users.accounts',
            'users.accounts.index',
            'users.accounts.show',
            'users.accounts.create',
            'users.accounts.update',
            'users.accounts.delete',
            // services
            'services',
            'services.index',
            'services.show',
            'services.create',
            'services.update',
            'services.delete',
            // plans
            'plans',
            'plans.index',
            'plans.show',
            'plans.create',
            'plans.update',
            'plans.delete',
            // users.plans
            'users.plans',
            'users.plans.index',
            'users.plans.show',
            // features
            'features',
            'features.index',
            'features.show',
            'features.create',
            'features.update',
            'features.delete',
            // transactions
            'transactions',
            'transactions.index',
            'transactions.show',
            'transactions.create',
            'transactions.update',
            'transactions.delete',
            'transactions.approve',
            // users.transactions
            'users.transactions',
            'users.transactions.index',
            'users.transactions.show',
            'users.transactions.create',
            'users.transactions.update',
            'users.transactions.delete',
        ];

        foreach ($permissions as $value) {
            Permission::firstOrCreate([
                'name' => $value,
            ]);
        }
    }
}
