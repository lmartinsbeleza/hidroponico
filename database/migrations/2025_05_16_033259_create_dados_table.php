<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('dados', function (Blueprint $table) {
            $table->id();
            $table->double('ph')->nullable();
            $table->double('temperatura_agua')->nullable();
            $table->double('condutividade')->nullable();
            $table->double('luminosidade')->nullable();
            $table->double('humidade')->nullable();
            $table->double('temperatura_ambiente')->nullable();
            $table->boolean('nivel_baixo')->default(false);
            $table->boolean('nivel_alto')->default(false);
            $table->boolean('motor_principal')->default(false);
            $table->boolean('motor_agua_limpa')->default(false);
            $table->boolean('motor_fertilizante')->default(false);
            $table->boolean('motor_acido')->default(false);
            $table->boolean('motor_base')->default(false);
            $table->unsignedBigInteger('hidroponia_id');
            $table->timestamps();

            $table->foreign('hidroponia_id')
                ->references('id')
                ->on('hidroponia');
        });
    }

    public function down(): void {
        Schema::dropIfExists('dados');
    }
};
