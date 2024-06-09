<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->has(Category::factory(3)->has(Product::factory(3)))->create();

        Role::factory(1)->create([
            'name' => 'SUPER_ADMIN',
        ]);
        Role::factory(1)->create([
            'name' => 'ADMIN',
        ]);
        Role::factory(1)->create([
            'name' => 'USER',
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
    }
}
