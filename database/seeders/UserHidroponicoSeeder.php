<?php

namespace Database\Seeders;

use App\Models\Hidroponico;
use App\Models\User;
use App\Models\UsersHidroponia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHidroponicoSeeder extends Seeder
{
    public function run(): void {
        $users = User::get()->pluck("id")->toArray();
        $hidroponias = Hidroponico::get()->pluck("id");

        foreach($hidroponias as $hidro){
            UsersHidroponia::create([
                "user_id" => fake()->randomElement($users),
                "hidroponia_id" => $hidro
            ]);
        }
    }
}
