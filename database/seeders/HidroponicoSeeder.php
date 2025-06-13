<?php

namespace Database\Seeders;

use App\Models\Hidroponico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HidroponicoSeeder extends Seeder
{
    public function run(): void {
        $plantacoes = ["Alface", "Tomate", "Erva"];

        foreach($plantacoes as $planta){
            Hidroponico::create([
                'plantacao' => $planta
            ]);
        }
    }
}
