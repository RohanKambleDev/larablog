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
        $permissions = [];
        $permissions['edit_articles'] = Permission::create(['name' => 'edit articles']);
        $permissions['delete_articles'] = Permission::create(['name' => 'delete articles']);
        $permissions['view_articles'] = Permission::create(['name' => 'view articles']);
        $permissions['edit_users'] = Permission::create(['name' => 'edit users']);
        $permissions['delete_users'] = Permission::create(['name' => 'delete users']);

        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'author']);
        $role->syncPermissions([$permissions['edit_articles'], $permissions['delete_articles'], $permissions['view_articles']]);

        $role = Role::create(['name' => 'member']);
        $role->syncPermissions([$permissions['view_articles']]);
    }
}
