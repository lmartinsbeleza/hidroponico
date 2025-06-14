<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void {
        User::create([
            'name' => "Luiz Paulo PG",
            'email' => "luiz.paulo@hidroview.com",
            'email_verified_at' => now(),
            'password' => bcrypt("123"),
        ]);

        User::create([
            'name' => "Iago Medeiros EL",
            'email' => "iago.medeiros@hidroview.com",
            'email_verified_at' => now(),
            'password' => bcrypt("123"),
        ]);
        
        User::factory()->count(5)->create();
    }
}
