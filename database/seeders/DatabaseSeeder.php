<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        role::create([
            'id' => 1,
            'desk_job' => 'admin'
        ]);
        role::create([
            'id' => 2,
            'desk_job' => 'player'
        ]);

        User::create([
            'name' =>'zenosamaa',
            'id_role' => 1,
            'email' => 'momo@gmail.com',
            'password' => bcrypt('1458529595'),
            'chip' => 1000,
        ]);
        User::create([
            'name' =>'chaeyoung',
            'id_role' => 2,
            'email' => 'chae@gmail.com',
            'password' => bcrypt('1458529595'),
            'chip' => 1000,
        ]);
    }
}
