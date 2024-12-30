<?php

namespace Database\Seeders;

use App\Models\Article;
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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Super Admin',
        //     'email' => 'super@gmail.com',
        //     'phone' => '123456789',
        //     'password' => bcrypt('12345'),
        //     'role' => 'superadmin',
        // ]);

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'phone' => '123456789',
        //     'password' => bcrypt('12345'),
        //     'role' => 'admin',
        // ]);

        // User::factory()->create([
        //     'name' => 'User',
        //     'email' => 'user@gmail.com',
        //     'phone' => '123456789',
        //     'password' => bcrypt('12345'),
        //     'role' => 'user',
        // ]);

        Article::factory(0)->create();
    }
}
