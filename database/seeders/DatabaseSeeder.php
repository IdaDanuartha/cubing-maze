<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CubeCategory;
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
            'role' => 'Course Maker',
        ]);    
        Level::create([
            'role' => 'Blog Maker',
        ]);
        Level::create([
            'role' => 'Cuber',
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

        User::create([
            'level_id' => 4,
            'username' => 'admin4',
            'email' => 'admincm4@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        CubeCategory::create([
            'icon_img' => '-',
            'name' => '2x2x2 Cube',
            'short_name' => '2x2'
        ]);
        CubeCategory::create([
            'icon_img' => '-',
            'name' => '3x3x3 Cube',
            'short_name' => '3x3'
        ]);
        CubeCategory::create([
            'icon_img' => '-',
            'name' => '4x4x4 Cube',
            'short_name' => '4x4'
        ]);
        CubeCategory::create([
            'icon_img' => '-',
            'name' => '5x5x5 Cube',
            'short_name' => '5x5'
        ]);
        CubeCategory::create([
            'icon_img' => '-',
            'name' => '6x6x6 Cube',
            'short_name' => '6x6'
        ]);
        CubeCategory::create([
            'icon_img' => '-',
            'name' => '7x7x7 Cube',
            'short_name' => '7x7'
        ]);
    }
}
