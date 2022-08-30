<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [];
        $permissions['edit_articles'] = Permission::create(['name' => 'edit_article']);
        $permissions['delete_articles'] = Permission::create(['name' => 'delete_article']);
        $permissions['view_articles'] = Permission::create(['name' => 'view_article']);
        $permissions['edit_users'] = Permission::create(['name' => 'edit_user']);
        $permissions['delete_users'] = Permission::create(['name' => 'delete_user']);

        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'author']);
        $role->syncPermissions([$permissions['edit_articles'], $permissions['delete_articles'], $permissions['view_articles']]);

        $role = Role::create(['name' => 'member']);
        $role->syncPermissions([$permissions['view_articles']]);
    }
}
