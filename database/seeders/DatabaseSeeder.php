<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Level;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Level::create([
            'role' => 'Admin',
        ]);

        Level::create([
            'role' => 'Comp Maker',
        ]);
        
        Level::create([
            'role' => 'Blog Maker',
        ]);

        User::create([
            'level_id' => 1,
            'username' => 'admin1',
            'email' => 'admincm1@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'level_id' => 2,
            'username' => 'admin2',
            'email' => 'admincm2@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'level_id' => 3,
            'username' => 'admin3',
            'email' => 'admincm3@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
