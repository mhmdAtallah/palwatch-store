<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'mhmd attalah',
            'email' => 'mhmd@gmail.com',
            "username" => 'mhmd01',
            'password' => "12312312",
            'isAdmin' => true,

        ]);

        User::factory()->create([
            'name' => 'ahmad draidy ',
            'email' => 'drd.ahmad@hotmail.com',
            "username" => 'drd12',
            'password' => "12312312",
            'isAdmin' => false,

        ]);


        User::factory(10)->create();


        



    }
}