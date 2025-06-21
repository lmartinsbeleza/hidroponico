<?php

namespace Database\Seeders;

use App\Models\Dados;
use App\Models\Hidroponico;
use Illuminate\Database\Seeder;

class DadosSeeder extends Seeder
{
    public function run(): void {
        $hidroponias = Hidroponico::get()->pluck("id");
        foreach($hidroponias as $hidro){
            for($x = 0; $x < fake()->numberBetween(50, 100); $x++){
                Dados::create([
                    "ph" => number_format((6.0 + (fake()->numberBetween(-2, 2)/fake()->numberBetween(2, 8))), 3),
                    "temperatura_agua" => number_format((22 + (fake()->numberBetween(-8, 8)/fake()->numberBetween(2, 8))), 3),
                    "condutividade" => number_format((1.8 + (fake()->numberBetween(-1, 1)/fake()->numberBetween(2, 8))), 3),
                    "luminosididade" => number_format((1.8 + (fake()->numberBetween(-1, 1)/fake()->numberBetween(2, 8))), 3),
                    "temperatura_ambiente" => number_format((1.8 + (fake()->numberBetween(-1, 1)/fake()->numberBetween(2, 8))), 3),
                    "nivel_baixo" => fake()->numberBetween(0, 1),
                    "nivel_alto" => fake()->numberBetween(0, 1),
                    "hidroponia_id" => $hidro,
                ]);
            }
        }
    }
}
