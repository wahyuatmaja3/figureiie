<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\Models\Figure;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Franchise;
use App\Models\User;

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

        User::create([
            'username' => 'wahyu tri',
            'email' => 'wahyutri@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '085733330808',
            'address' => 'Jl. Merkurius no 30, Rungkut, Surabaya',
            'sex' => 'm',
            'type' => 'a'
        ]);

        Franchise::create([
            'name' => 'One Piece'
        ]);
        Franchise::create([
            'name' => 'Jujutsu Kaisen'
        ]);
        Franchise::create([
            'name' => 'Kimetsu no Yaiba'
        ]);
        Franchise::create([
            'name' => 'Attack on Titan'
        ]);

        Brand::create([
            'name' => 'Aniplex'
        ]);
        Brand::create([
            'name' => 'Solarain'
        ]);
        Brand::create([
            'name' => 'APEX'
        ]);

        Category::create([
            'name' => 'Figma'
        ]);
        
        Figure::factory(12)->create();
    }
}
