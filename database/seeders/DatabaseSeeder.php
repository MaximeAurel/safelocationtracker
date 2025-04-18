<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'nom'=>'admin',
            'prenom'=>'admin',
            'adresse'=>'',
            'telephone'=>'000000000',
            'email'=>'admin@admin.com',
            'pseudo'=>'admin',
            'password'=>Hash::make('admin'),
            'fonction'=>1,
        ]);
        
    }
}
