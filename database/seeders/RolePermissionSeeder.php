<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'admin.create',
            'admin.read',
            'admin.update',
            'admin.delete',
            'product.create',
            'product.read',
            'product.update',
            'product.delete',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $manager = Role::firstOrCreate(['name' => 'super-admin']); // Full CRUD
        $moderator = Role::firstOrCreate(['name' => 'product-moderator']); // Read + Delete
        $editor = Role::firstOrCreate(['name' => 'product-editor']); // Read + Update

        // Assign permissions to roles
        $manager->syncPermissions($permissions);
        $moderator->syncPermissions(['product.read', 'product.delete']);
        $editor->syncPermissions(['product.read', 'product.update']);
    }
}
