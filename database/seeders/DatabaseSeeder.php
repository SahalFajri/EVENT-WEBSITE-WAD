<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Ticket;
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

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super@gmail.com',
            'phone' => '123456789',
            'password' => bcrypt('12345'),
            'role' => 'superadmin',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '123456789',
            'password' => bcrypt('12345'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'phone' => '123456789',
            'password' => bcrypt('12345'),
            'role' => 'user',
        ]);

        Ticket::create([
            'name' => 'EARLYBIRD',
            'stock' => 250,
            'price' => 150000,
            'description' => 'Nikmati kesempatan spesial dengan harga terbaik! Tiket EARLYBIRD cocok untuk Anda yang ingin merencanakan lebih awal dan mendapatkan akses ke event dengan harga paling hemat.',
            'is_available' => true,
        ]);

        Ticket::create([
            'name' => 'PRESALE',
            'stock' => 250,
            'price' => 200000,
            'description' => 'Dapatkan tiket PRESALE untuk memastikan tempat Anda di acara ini! Tiket ini memberikan akses penuh ke semua pengalaman event dengan harga lebih ekonomis sebelum harga naik ke REGULERPASS.',
            'is_available' => false,
        ]);

        Ticket::create([
            'name' => 'REGULERPASS',
            'stock' => 250,
            'price' => 300000,
            'description' => 'Tiket REGULERPASS adalah pilihan terakhir untuk Anda yang ingin tetap hadir di event ini! Dengan tiket ini, Anda mendapatkan pengalaman maksimal tanpa kehilangan momen seru.',
            'is_available' => false,
        ]);

        // Article::factory(0)->create();
    }
}
