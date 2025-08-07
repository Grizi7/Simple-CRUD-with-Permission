<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Enums\UserTypeEnum;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);
        
        $admin = User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
            'type' => UserTypeEnum::admin->value,
        ]);
        $admin->assignRole('super-admin');

        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'user@example.com',
            'type' => UserTypeEnum::user->value,
        ]);

        User::factory(10)->create();
        Product::factory(10)->create();
    }
}
